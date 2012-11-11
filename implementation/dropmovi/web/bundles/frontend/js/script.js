

$(document).ready(function(){
    var urlRecent = $("#filter-recent").attr("href");
    var urlPopular = $("#filter-popular").attr("href");
//    var urlAll = $("#filter-all").attr("href");
    
    function queryAjaxHomepage(url){
        $.ajax({
            url: url,
//            beforeSend: function (){            
//                $("#wrapper-result-publi").html(img);
//            },
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
