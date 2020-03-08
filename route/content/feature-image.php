<?php
	if(isset($_SESSION['log']) && !isset($_POST['f_edit'])){
        if(isset($_POST['f_save'])){
            if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
                $temp_time = time();
                $file_name = $_FILES['image']['name'];
                $temp_name = $_FILES['image']['tmp_name'];
                $file_extension = explode(".", $file_name);
                $path = "img/content_image/". $client['uid'] . $temp_time . MD5($file_name)."." .strtolower(end($file_extension));
                $upload = move_uploaded_file($temp_name, $path);
                if(!$upload){
                    $error = "error uploading";   
                }
            }
            $changes = true;
            $_SESSION['content']['fimg'] = $path;
        }
        
?>
    <form method="post">
        <div class="form-row">
            <div class='col-12'>
                <button type="submit" name="f_edit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <image src="<?php echo$_SESSION['content']['fimg']?>">
            </div>
        </div>
    </form>	

<?php	
	}else if(isset($_POST['f_edit'])){
?>
    
    <form method="post" enctype="multipart/form-data">     
        <div class="form-row">
            <div class='col-12'>
                <button type="submit" name="f_save" class="btn btn-primary">Confirm Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <input type="file" name="image" class="form-control" id="file">
            </div>
        </div>
    </form>
<?php    
    }else{
?>  
    <div class="row">
        <div class="col-12">
        <h1>Description</h1>
        </div>
        <div class="col-12">
            <image src="<?php echo$_SESSION['content']['fimg']?>">
        </div>
    </div>    
<?php 
    }
?>