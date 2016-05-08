$(document).ready(function() {
    // Sự kiện đăng nhập
    $('#fLogin #btnLogin').click(function() {
        $('#login_msg').html('<div class="loading"><img src="templates/images/loading.gif" /></div>');
        var user = $('#fLogin #txtUser').val();
        var pass = $('#fLogin #txtPass').val();
        $.ajax({
            url: "login.php",
            type: "get",
            data: "user="+user+"&pass="+pass,
            async: true,
            success: function(result_login) {
                if (result_login == 'Miss') {
                    $('#login_msg').html('<span class="error">Vui lòng nhập đầy đủ thông tin</span>');
                } else if (result_login == 'Wrong') {
                    $('#login_msg').html('<span class="error">Sai thông tin đăng nhập</span>');
                } else {
                    $('#login_msg').html(result_login);
                    // Reset form
                    document.fLogin.reset();
                    // Ẩn form login
                    $('#fLogin').hide();
                    // Hiện form comment
                    $('#fComment').show();
                }
            }
        });
        return false;
    });
    
    // Sự kiện đăng xuât
    $(document).on('click', '#login_msg a[title="logout"]', function() {
        $.ajax({
            url: "logout.php",
            type: "get",
            data: "",
            async: true,
            success: function(result_logout) {
                if (result_logout == 'Finish') {
                    $('#login_msg').html('');
                    // Hiện lại form login
                    $('#fLogin').show();
                    // Ẩn form comment
                    $('#fComment').hide();
                }
            }
        });
        return false;
    });
    
    // Sự kiện comment
    $('#fComment #btnComment').click(function() {
        $('#comment_msg').html('<img src="templates/images/loading.gif" />');
        var comment = $('#fComment #txtComment').val();
        var news_id = $('#fComment #news_id').val();
        $.ajax({
            url: "comment.php",
            type: "post",
            data: "comment="+comment+"&news_id="+news_id,
            async: true,
            success: function(result_comment) {
                if (result_comment == 'Miss') {
                    $('#comment_msg').html('Vui lòng nhập đầy đủ thông tin');
                } else {
                    $('#comment_msg').html('');
                    document.fComment.reset();
                    $('#comment_content').html(result_comment);
                }
            }
        });
        return false;
    });
});