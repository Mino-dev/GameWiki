<?php
	if(isset($_SESSION['log']) && !isset($_POST['c_edit'])){
        if(isset($_POST['c_save'])){
            $_SESSION['content'] = $_POST['textchange'];
        }
?>
    <h1>Changelogs</h1>
    <?php echo $_SESSION['content']?>
    <form method="post">
        <button type="submit" name="c_edit" class="btn btn-primary">Edit</button>
    </form>	
        
<?php	
	}else if(isset($_POST['c_edit'])){
?>
    <form method="post">
        <div class='form-group'>
            <label for='textchange'>ChangeLogs</label>
            <textarea class='form-control' name='textchange' id='textchange' rows='3'><?php echo $_SESSION['content']?></textarea>
        </div>
        <button type='submit' name='c_save' class='btn btn-primary'>Save</button>
    </form>
<?php    
    }else{
?>  
    <h1>Changelogs</h1>
    <?php echo $_SESSION['content']?>
<?php 
    }
?>