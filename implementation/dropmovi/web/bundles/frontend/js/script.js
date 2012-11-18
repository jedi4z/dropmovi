
/*=================================================
    Homepage
=================================================*/

$(document).ready(function(){
    var urlPopular = $("#filter-popular").attr("href");
    var urlRecent = $("#filter-recent").attr("href");
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
            $("#wrapper-all-commets").append('<div class="wrapper-comment owner-comment"><img class="img-rounded" src="'+comment.photoAuthor+'"><div class="comment-user">'+comment.author+'</div><div class="comment-content"><blockquote>'+comment.content+'</blockquote></div><div class="comment-date">'+comment.date+'</div></div>');
            $("#add_comment_content").attr("value", "");
            $("#wrapper-form-comment input[type=submit]").hide();
            $("#add_comment_content").css({
                "height":"25px"
            });
        });
        
    });
});

/*=================================================
    Edit Publication
=================================================*/


// Get the div that holds the collection of tags
var collectionHolder = $('ul.tags');

// setup an "add a tag" link
var $addTagLink = $('<a href="#" class="add_tag_link">Add a tag</a>');
var $newLinkLi = $('<li></li>').append($addTagLink);

jQuery(document).ready(function() {
     collectionHolder.find('li').each(function() {
        addTagFormDeleteLink($(this));
    });
    // add the "add a tag" anchor and li to the tags ul
    collectionHolder.append($newLinkLi);

    $addTagLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm(collectionHolder, $newLinkLi);
    });
});

function addTagForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.attr('data-prototype');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on the current collection's length.
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#">delete this tag</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // evita crear el enlace con una "#" en la URL
        e.preventDefault();

        // quita el li de la etiqueta del formulario
        $tagFormLi.remove();
    });
}



