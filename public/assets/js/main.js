$(document).ready(function() {
    $('.modal').removeAttr('tabindex');

    
    // Table Row Link
    $('*[data-href]').click(function(){
        window.location = $(this).data('href');
        return false;
    });
});