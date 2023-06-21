$(document).ready(function() {
    $.material.init();
    $('.textarea').summernote({
        placeholder: 'write content here...',
        fontNames: ['Lato', 'Arial', 'Courier New'],

    });
    $('body').on('click', '.btn-codeview', function (e) {

        if ( $('.note-editor').hasClass("fullscreen") ) {
            var windowHeight = $(window).height();
            $('.note-editable').css('min-height',windowHeight);
        }else{
            $('.note-editable').css('min-height','300px');
        }
    });
    $('body').on('click','.btn-fullscreen', function (e) {
        setTimeout (function(){
            if ( $('.note-editor').hasClass("fullscreen") ) {
                var windowHeight = $(window).height();
                $('.note-editable').css('min-height',windowHeight);
            }else{
                $('.note-editable').css('min-height','300px');
            }
        },500);

    });

    $('.note-link-url').on('keyup', function() {
        if($('.note-link-text').val() != '') {
            $('.note-link-btn').attr('disabled', false).removeClass('disabled');
        }
    });
$("#category").select2({
    theme: "bootstrap"
});
    $("#selecttag").select2({
        tags: true,
        tokenSeparators: [',', ' '],
        theme: "bootstrap",
        width:"100%",
        placeholder:"tags"
    });
});
