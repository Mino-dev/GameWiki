
var elements = document.getElementsByClassName("adminEdit");
var getValues = function() {
    var attribute = $(this).attr("value");
    $.ajax({
        url : 'handlers/admin-handler.php',
        type : 'POST',
        data: {
            updatedata : attribute,
        },
        error : function(XMLHttpRequest, textStatus, errorThrown){
            alert ("Error Occured");
        }
    });
};
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', getValues, false);
}	