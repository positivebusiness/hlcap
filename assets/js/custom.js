$('.js_btn-contact').on('click', function(e) {
    e.preventDefault();

    var btn = $(this),
        container = $(this).closest('.psc'),
        form = container.find('form'),
        message = container.find('.response-success');

    if (container.hasClass('processing')) {
        return false;
    }

    btn.addClass('active');
    container.addClass('processing');

    $.post("sendmail/sendmail.php",form.serialize(),function(data,status){
        console.log(data);
    },"json");

    setTimeout(function() {
        btn.removeClass('active');
        container.removeClass('processing');
        // form.slideUp();
        message.slideDown().addClass('active');
    }, 2000);

    return false;
});