$(document).ready(function () {
    $('.toggle input[type="checkbox"]').click(function () {

        $(this).parent().toggleClass('on')
        if ($(this).parent().hasClass('on')) {
            $(this).parent().children('.label').text('Hiện bài viết')
        } else {
            $(this).parent().children('.label').text('Ẩn bài viết')
        }
    });
    $('input').focusin(function () {
        $(this).parent().addClass('focus');
    });
    $('input').focusout(function () {
        $(this).parent().removeClass('focus');
    });
});
