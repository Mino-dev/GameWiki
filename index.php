<?php
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="script" href="script/index.js"/>
		<link rel="icon" type="image/png" href="img/icon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="img/icon/favicon-16x16.png" sizes="16x16">	
		<link rel="manifest" href="img/icon/site.webmanifest">
		<link rel="icon" type="image/png" href="img/icon/android-chrome-512x512.png" sizes="512x512">
		<link rel="icon" type="image/png" href="img/icon/android-chrome-192x192.png" sizes="192x192">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
		<?php require("style/decache.php"); ?>
		<link rel="stylesheet" href="style/style.css?v=<?php echo returnVersion();?>" type="text/css">
		<title>Fishing Lagoon Idle Wiki</title>
	</head>
	<body>

		<div class="container-fluid main-content">
			<?php
				include ('route/home-page.php');
			?>

		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
		<script type="text/javascript" charset="utf-8">
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
			};
			$('#tab-content a').on('click', function(e) {
				e.preventDefault();
				$(this).tab('show');
				var theThis = $(this);
				$('#tab-pane a').removeClass('active');
				theThis.addClass('active');
			});	
		</script>
	</body>
</html>
