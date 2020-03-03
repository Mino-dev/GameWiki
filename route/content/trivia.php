<?php
	if(isset($_SESSION['log']) && !isset($_POST['t_edit'])){
        if(isset($_POST['t_save'])){
            $_SESSION['content'] = $_POST['texttriv'];
        }
?>  
    <h1>Trivia</h1>
    <?php echo $_SESSION['content']?>    
    <form method="post">
        <button type="submit" name="t_edit" class="btn btn-primary">Edit</button>
    </form>	
        
<?php	
	}else if(isset($_POST['t_edit'])){
?>
    <form method="post">
        <div class='form-group'>
            <label for='texttriv'>Trivia</label>
            <textarea class='form-control' name='texttriv' id='texttriv' rows='3'><?php echo $_SESSION['content']?></textarea>
        </div>
        <button type='submit' name='t_save' class='btn btn-primary'>Save</button>
    </form>
<?php    
    }else{
?>  
    <h1>Trivia</h1>
    <?php echo $_SESSION['content']?>
<?php 
    }
?>