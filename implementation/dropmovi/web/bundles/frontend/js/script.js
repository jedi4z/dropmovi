
/*=================================================
    Homepage
=================================================*/

$(document).ready(function(){
    var urlRecent = $("#filter-recent").attr("href");
    var urlPopular = $("#filter-popular").attr("href");
    var urlAll = $("#filter-all").attr("href");
    
    function queryAjaxHomepage(url){
        $.ajax({
            url: url,
            success: function(data) {
                $("#wrapper-result-publi").hide().html(data).fadeIn("slow");
            }
        });
    }
    
    /* load the popular publication for default*/
    queryAjaxHomepage(urlRecent);
    
    /* load the recent publications */
    $("#filter-recent").click(function(event){
        event.preventDefault();
        queryAjaxHomepage(urlRecent);
    });
    
    /* load the popular publications*/
    $("#filter-popular").click(function(event){
        event.preventDefault();
        queryAjaxHomepage(urlPopular);
    });
    
    /* load alls publications*/
    $("#filter-all").click(function(event){
        event.preventDefault();
        queryAjaxHomepage(urlAll);
    });
});

/*=================================================
    View Publication
=================================================*/

$(document).ready(function(){
    $("#add_comment_content").focus(function(){
        $(this).css({
            "height":"80px"
        });
        $("#wrapper-form-comment input[type=submit]").fadeIn("slow");
    });
    $("#add_comment_content").blur(function(){
        if ($(this).val() == ""){
            $(this).css({
                "height":"25px"
            });
            $("#wrapper-form-comment input[type=submit]").fadeOut("slow");
        }
    });
});

$(document).ready(function(){
    $(".link-delete-comment").click(function(event){
        event.preventDefault();
        var idComment = $(this).attr("id");
        $.ajax({
            url: $(this).attr("href"),
            success: function() {
                $("#comment-"+idComment).hide("slow");
            }
        });
    });
});


$(document).ready(function(){
    $("#form-comment").submit(function(event){
        event.preventDefault();
        $.post( $(this).attr("action"), $(this).serialize(), function(data) {
            comment = JSON.parse(data);
            $("#wrapper-all-commets").append('<div class="wrapper-comment owner-comment"><img class="img-rounded" src="'+comment.photoAuthor+'"><div class="comment-user">'+comment.author+'</div><div class="comment-content"><blockquote>'+comment.content+'</blockquote></div><div class="comment-date">'+comment.date+'</div><div class="comment-option"><a id="'+comment.id+'" href="#">Eliminar</a></div></div>');
            $("#add_comment_content").attr("value", "");
            $("#wrapper-form-comment input[type=submit]").hide();
            $("#add_comment_content").css({
                "height":"25px"
            });
        });
        
    });
});


