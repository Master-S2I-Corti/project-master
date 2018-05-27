

$(".btn-refresh").click(function(){
    $.ajax({
        type: 'GET',
        url: '/project-master/public/refresh_captcha',
        success: function(data){
            $(".captcha span").html(data.captcha);
        }
    });
});