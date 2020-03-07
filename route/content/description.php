<?php
	if(isset($_SESSION['log']) && !isset($_POST['d_edit'])){
        if(isset($_POST['d_save'])){
            $changes = true;
            $_SESSION['content']['desc'] = $_POST['textdesc'];
            
        }
?>
    <form method="post">
        <div class="form-row">
            <div class='col-6'>
                <h1>Description</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="d_edit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="form-row">
            <?php echo$_SESSION['content']['desc']?>
        </div>
    </form>	

<?php	
	}else if(isset($_POST['d_edit'])){
?>
    
    <form method="post">     
        <div class="form-row">
            <div class='col-6'>
                <h1>Description</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="d_save" class="btn btn-primary">Confirm Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <textarea autofocus class='form-control' name='textdesc' id='textdesc' rows='7'><?php echo$_SESSION['content']['desc']?></textarea>
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
            <?php echo$_SESSION['content']['desc']?>
        </div>
    </div>    
<?php 
    }
?>