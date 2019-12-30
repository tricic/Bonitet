"use strict";

/*!
 * SinglePageElementManager
 * Author: Ismar Tričić
 * Github: github.com/tricic
 */

class SinglePageElementManager {
/*
 * @property    data                {array}     Array of objects of element data
 * @property    classes             {array}     Array of classes to be applied on element
 * @property    index               {object}    Index (home) element
 * @property    active              {object}    Currently active element
 * @property    errors              {boolean}   True for configuration error
 * @property    defaultTitle        {string}    Default title
 * @property    executeOnBoot       {array}     Array of functions to be executed once on startup
 * @property    beforeElementLoad   {array}     Array of functions to be executed every time before element loads
 * @property    afterElementLoad    {array}     Array of functions to be executed every time after element loads
 */

    /*
     * @constructor
     *
     * @param   data    {array}     @property data
     * @param   classes {string}    @property classes
     */
    constructor(data, classes = null) { 
        this.data = data;
        this.classes = classes || [];
        this.index = null;
        this.active = {};
        this.errors = false;
        this.defaultTitle = document.getElementsByTagName('title')[0].innerHTML || 'Please set title';
        this.executeOnBoot = [];
        this.beforeElementLoad = [];
        this.afterElementLoad = [];

        // Data validations
        if(data.constructor !== Array) {
            console.log('Error: Data must be an array of objects');
            this.errors = true;
        }

        if(data.length < 1) {
            console.log('Error: Data array is empty');
            this.errors = true;
        }

        for(var i = 0; i < data.length; i++) {
            if(data[i].constructor !== Object) {
                console.log('Error: Data must be an array of objects, non-object found');
                this.errors = true;
            }
        }
        
        // Initialize index element
        for(var i = 0; i < data.length; i++) {
            if(data[i].index) {
                this.index = data[i];
                break;
            }
        }
        
        if(this.index === null) {
            console.log("Error: Please choose an index element by setting it's property 'index' to {boolean} true");
            this.errors = true;
        }

        // Classes validation
        if(classes.constructor !== Array) {
            console.log('Error: Classes must be an array of strings (class names), one per array element');
            this.errors = true;
        }

        for(var i = 0; i < classes.length; i++) {
            if(classes[i].constructor !== String) {
                console.log('Error: Classes must be an array of strings, non-string found');
                this.errors = true;
            }
        }
    }
    
    /*
     * @method  run     Starts the program
     * 
     * @return {void}
     */
    run() {
        if(this.errors) {
            console.log("Error(s) have been logged, can't run program");
            return;
        }

        // Get hash location without hash
        var hashLocation = window.location.hash.slice(1).split('?')[0];
    
        // If hash location is empty, that means index element should load
        // Index element will load by default anyways so we're just setting active element to index
        // Note: index element MUST NOT be initially hidden
        if(hashLocation === '') {
            this.active = this.index;
        } else {
            // This will be triggered when page is directly navigated with hash location (which needs to be loaded)
            // We're setting the index element as our active element because it will load by default
            this.active = this.index;
    
            var target = this.getObjectData(hashLocation);
    
            if(target) {
                this.loadElement(target);
            }
        }

        // Execution of executeOnBoot functions
        for(var i = 0; i < this.executeOnBoot.length; i++) {
            if(typeof this.executeOnBoot[i] === 'function') {
                this.executeOnBoot[i]();
            } else {
                console.log("Error: this.executeOnBoot[" + i + "] is not a function");
            }
        }
        
        this.setClickHandler();
    }

    /*
     * @method  setClickHandler    Sets click handlers and detects the anchors
     * 
     * @return  {void}
     */
    setClickHandler() {
        var _this = this;

        document.body.addEventListener('click', function(e) {
            var target = null;
            var targetHashLocation = null;

            // If clicked element is anchor, get its hash location
            if(e.target.nodeName.toLowerCase() == 'a') {
                // Return if href is not a hash link
                if(!(e.target.getAttribute('href').charAt(0) === '#')) {
                    return;
                }

                targetHashLocation = e.target.getAttribute('href').slice(1).split('?')[0];

            } else if(e.target.parentNode.nodeName.toLowerCase() == 'a') {
                // Do the same if parent node is an anchor, could be in the case where button is inside the anchor

                if(!(e.target.parentNode.getAttribute('href').charAt(0) === '#')) {
                    return;
                }

                targetHashLocation = e.target.parentNode.getAttribute('href').slice(1).split('?')[0];
            }
            
            if(targetHashLocation) {
                target = _this.getObjectData(targetHashLocation);

                // Do not load active element again
                if(target.elementId === _this.active.elementId) {
                    return;
                }
    
                if(target) {
                    _this.loadElement(target);
                }
            }
        });
    }

    /*
     * @method  getObjectData           Returns an element object of given hash location, or null
     * 
     * @param   hashLocation  {string}  Hash location without hash
     * 
     * @return {object} or {null}
     */
    getObjectData(hashLocation) {
        if(!hashLocation) {
            return null;
        }

        for(var i = 0; i < this.data.length; i++) {
            if(this.data[i].hashLocation === hashLocation) {
                return this.data[i];
            }
        }

        console.log("Error: Can't find an element associated with #" + hashLocation + " hash location.");
        return null;
    }

    /*
     * @method  loadElement         Loads given {object} element
     * 
     * @param   target  {object}    An element from data array to be loaded
     * 
     * @return  {void}
     */
    loadElement(target) {
        // Execution of beforeElementLoad functions
        for(var i = 0; i < this.beforeElementLoad.length; i++) {
            if(typeof this.beforeElementLoad[i] === 'function') {
                this.beforeElementLoad[i]();
            } else {
                console.log("Error: this.beforeElementLoad[" + i + "] is not a function");
            }
        }

        // Hide active element
        document.getElementById(this.active.elementId).style.display = 'none';

        // Remove class(es) from active element
        if(this.active.applyClasses !== false) {
            for (var i = 0; i < this.classes.length; i++) {
                document.querySelector('a[href="#' + this.active.hashLocation + '"').classList.remove(this.classes[i]);
            }
        }

        // Display target element
        document.getElementById(target.elementId).style.display = 'block';
        
        // Add class(es) to target element
        if(target.applyClasses !== false) {
            for (var i = 0; i < this.classes.length; i++) {
                document.querySelector('a[href="#' + target.hashLocation + '"').classList.add(this.classes[i]);
            }
        }

        // Change title
        if(target.title) {
            document.getElementsByTagName('title')[0].innerHTML = target.title;
        } else {
            document.getElementsByTagName('title')[0].innerHTML = this.defaultTitle;
        }

        // New element is now loaded and becomes active element
        this.active = target;

        // Execution of afterElementLoad functions
        for(var i = 0; i < this.afterElementLoad.length; i++) {
            if(typeof this.afterElementLoad[i] === 'function') {
                this.afterElementLoad[i]();
            } else {
                console.log("Error: this.afterElementLoad[" + i + "] is not a function");
            }
        }
    }

    /*
     * @method  getUrlParameter     Returns the value of GET parameter, or null
     * 
     * @param   {string}    name    Parameter name
     * 
     * @return {void}
     */
    getUrlParameter(name) {
        var result = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return result ? decodeURI(result[1]) : null;
    }
}

var app = new SinglePageElementManager([
    {
        hashLocation: 'home',
        elementId: 'page-index',
        index: true
    },
    {
        hashLocation: 'kontakt',
        elementId: 'page-kontakt',
        title: 'Kontakt | Knjigovodstvo i računovodstvo - Bonitet d.o.o. Cazin'
    },
], ['current']);

app.executeOnBoot = [
    function() {
        // Navbar toggle button
        $('#nav-button').click(function() {
            $('#nav').toggle('fast', 'linear');
            //$('#nav').css('display', 'block');
        });
    },
    function() {
        // Disable google map scroll unless its clicked
        $('#map')
            .click(function(){
                    $(this).find('iframe').addClass('clicked')})
            .mouseleave(function(){
                    $(this).find('iframe').removeClass('clicked')});
    },
    function() {
        // Prevent img drag
        $('img').on('dragstart', function(e) {
            e.preventDefault();
        });
    },
    function() {
        // Check for success parameter
        if(app.getUrlParameter('success') !== null) {
            if(app.getUrlParameter('success') == 'true') {
                alert('Vaša poruka je uspješno poslana, očekujte odgovor.');
            } else {
                alert('Greška prilikom slanja poruke, pokušajte opet ili nas nazovite.');
            }
        }
    }
];

app.run();