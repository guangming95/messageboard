$(function () {
    //侧边栏点击事件
    $('#add_comment').click(function () {
        location.href = './html/add_comment.html';
    });

    $('#exit').click(function () {
        // $.cookie('age', '1', { path: '/' });
        $.ajax({
            url: '../php/exit.php',
            type: 'post',
            dataType: 'text',
            success: function (info) {
                console.log(info);
                showTips(info);
                $.cookie('username', null, {expires: -100, path: '/'});
                setTimeout(function () {
                    location.href = '../index.html';
                }, 3000);
            },
            error: function (info) {
                console.log(info);
            }
        });
    });


    $('.scrolltop').click(function () {
        $('html,document').animate({scrollTop: 0});
    });


    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $('.scrolltop').removeClass('disable');
        } else {
            $('.scrolltop').addClass('disable');
        }
    });


    function showTips(content) {
        $('.tips>p').text(content).stop(true).fadeIn(400).delay(2000).fadeOut(400);
    }
});