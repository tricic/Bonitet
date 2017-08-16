// Navbar toggle button
    $('#nav-button').click(function() {
        $('#nav').toggle('fast', 'linear');
        $('#nav').css('display', 'block');
    });

// Disable google map scroll unless its clicked
    $('#googlemap')
        .click(function(){
                $(this).find('iframe').addClass('clicked')})
        .mouseleave(function(){
                $(this).find('iframe').removeClass('clicked')});

// Scroll top animation
    $('#to-top').click(function(){
        $(document.body).animate({'scrollTop' : 0}, 1000);
    });