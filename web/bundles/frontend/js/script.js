
/*=================================================
    Homepage
=================================================*/

$(document).ready(function(){
    var urlPopular = $("#filter-popular").attr("href");
    var urlRecent = $("#filter-recent").attr("href");
    var urlCategories = $("#filter-categories").attr("href");
    
    function queryAjaxHomepage(url){
        $.ajax({
            url: url,
            success: function(data) {
                $("#wrapper-result-publi").hide().html(data).fadeIn("slow");
            }
        });
    }
    
    /* load the popular publication for default*/
    queryAjaxHomepage(urlPopular);
    
    /* load the popular publications*/
    $("#filter-popular").click(function(event){
        event.preventDefault();
        queryAjaxHomepage(urlPopular);
    });

    /* load the recent publications */
    $("#filter-recent").click(function(event){
        event.preventDefault();
        queryAjaxHomepage(urlRecent);
    });   
    
    /* load alls publications*/
    $("#filter-categories").click(function(event){
        event.preventDefault();
        
    });
});

$(document).ready(function(){
    $('.menu-home li > a').click(function() {
        $('.menu-home li').removeClass();
        $(this).parent().addClass('active');
    });
});
/*=================================================
    View Publication
=================================================*/

$(document).ready(function(){
    $("#comment_content").focus(function(){
        $(this).css({
            "height":"80px"
        });
        $("#wrapper-form-comment input[type=submit]").fadeIn("slow");
    });
    $("#comment_content").blur(function(){
        if ($(this).val() == ""){
            $(this).css({
                "height":"25px"
            });
            $("#wrapper-form-comment input[type=submit]").hide();
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
            $("#wrapper-all-commets").append('<div class="wrapper-comment"><img class="img-rounded" src="'+comment.photoAuthor+'"><div class="comment-user">'+comment.author+'</div><div class="comment-content"><blockquote>'+comment.content+'</blockquote></div><div class="comment-date">'+comment.date+'</div></div>');
            $("#comment_content").attr("value", "");
            $("#wrapper-form-comment input[type=submit]").hide();
            $("#comment_content").css({
                "height":"25px"
            });
        });
        
    });
});


/*=================================================
    Send Invitation
=================================================*/

$(document).ready(function(){
    var formSendInvitation= $('form#form-send-invitation');
    var resultSendInvitation = $('div#wrapper-result-send-invitation');
    var inputSendInvitation = formSendInvitation.children('input');
    formSendInvitation.submit(function(event){
        event.preventDefault();
        $.post(formSendInvitation.attr('action'), formSendInvitation.serialize(), function(data){
            resultSendInvitation.fadeIn('slow').html(data).delay(3000).fadeOut('slow');
            inputSendInvitation.val('');
        });
    });
});