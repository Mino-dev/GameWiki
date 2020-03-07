<?php
	if(isset($_SESSION['log']) && !isset($_POST['g_edit'])){
        if(isset($_POST['g_save'])){
            $changes = true;
            $_SESSION['content']['game'] = $_POST['textgame'];
        }
?>

        
    <form method="post">
        <div class="form-row">
            <div class='col-6'>
                <h1>Gameplay</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="g_edit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="form-row">
            <?php echo$_SESSION['content']['game']?>
        </div>
    </form>	

<?php	
	}else if(isset($_POST['g_edit'])){
?>
    
    <form method="post">     
        <div class="form-row">
            <div class='col-6'>
                <h1>Gameplay</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="g_save" class="btn btn-primary">Confirm Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <textarea autofocus class='form-control' name='textgame' id='textgame' rows='7'><?php echo$_SESSION['content']['game']?></textarea>
            </div>
        </div>
    </form>
<?php    
    }else{
?>  
    <div class="row">
        <div class="col-12">
        <h1>Gameplay</h1>
        </div>
        <div class="col-12">
            <?php echo$_SESSION['content']['game']?>
        </div>
    </div>    
<?php 
    }
?>