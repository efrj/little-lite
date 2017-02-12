
$(document).ready(function(){
    $.ajax({
        method: 'get',
        url: '/index.php?PostController/postList',
        success: function(data) {
            $('#posts-menu').html(data);
        }
    });
});