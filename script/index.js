window.onbeforeunload = function () {
    var check = document.querySelector('[data-foo="editing"]');
    if(check!=null){
        return "Do you really want to close?";
    }
};

document.execCommand('defaultParagraphSeparator', false, 'p');

var upload = document.getElementById('e5');
var uploadFile = function(){
    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);
    $.ajax({
        url : 'handlers/user-image-handler.php',
        type : 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data){
            if(data == 1){
                window.location='index.php';
            }else{
                alert("Error uploading the image");
            }           
        },
        error : function(XMLHttpRequest, textStatus, errorThrown){
            alert ("Error Occured");
        }
    });
    return false;
};


upload.addEventListener('click', uploadFile, false);

var elements = document.getElementsByClassName("userEdit");
var convertoEditable = function() {
    var value = $(this).attr("value");
    var id = $(this).attr("id");
    var button = document.getElementById(id);
    var element = document.getElementById(value);                
    if (element.isContentEditable) {
        element.contentEditable = 'false';
        button.innerHTML = 'Edit';
        $(this).attr('data-foo', 'edit'); 
        var text = element.textContent;
        $.ajax({
            url : 'handlers/user-content-handler.php',
            type : 'POST',
            data: {index: value, content: text},
            success: function(data){
                window.location='index.php';
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert ("Error Occured");
            }
        });
    } else {
        element.contentEditable = 'true';
        button.innerHTML = 'Confirm Edit';
        $(this).attr('data-foo', 'editing'); 
    }
    return false;
};
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', convertoEditable, false);
}	