<?php
	if(isset($_SESSION['log']) && !isset($_POST['d_edit'])){
        if(isset($_POST['d_save'])){
            $_SESSION['content'] = $_POST['textdesc'];
        }
?>
    <h1>Description</h1>
    <?php echo $_SESSION['content']?>
    <form method="post">
        <button type="submit" name="d_edit" class="btn btn-primary">Edit</button>
    </form>	
        
<?php	
	}else if(isset($_POST['d_edit'])){
?>
    <form method="post">
        <div class='form-group'>
            <label for='textdesc'>Description</label>
            <textarea class='form-control' name='textdesc' id='textdesc' rows='3'><?php echo $_SESSION['content']?></textarea>
        </div>
        <button type='submit' name='d_save' class='btn btn-primary'>Save</button>
    </form>
<?php    
    }else{
?>  
    <h1>Description</h1>
    <?php echo $_SESSION['content']?>
<?php 
    }
?>