// Navbar toggle button
    $('#nav-button').click(function() {
        $('#nav').toggle('fast', 'linear');
        $('#nav').css('display', 'block');
    });

// Disable google map scroll unless its clicked
    $('#map')
        .click(function(){
                $(this).find('iframe').addClass('clicked')})
        .mouseleave(function(){
                $(this).find('iframe').removeClass('clicked')});

// Scroll top animation
    $('#scroll-top').click(function(){
        $(document.body).animate({'scrollTop' : 0}, 1000);
    });

// Get URL Params
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
        return null;
        }
        else{
        return decodeURI(results[1]) || 0;
        }
    }

// Check if mail was sent
    if($.urlParam('success') !== null) {
        if($.urlParam('success') === 'true') {
            alert('Vaša poruka je uspješno poslana! Očekujte odgovor.');
        } else {
            alert('Greška prilikom slanja poruke, pokušajte opet ili nas nazovite!');
        }
    }

// Prevent img drag
    $('img').on('dragstart', function(e) {
        e.preventDefault();
    });