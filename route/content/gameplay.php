<?php
	if(isset($_SESSION['log']) && !isset($_POST['g_edit'])){
        if(isset($_POST['g_save'])){
            $_SESSION['content'] = $_POST['textgame'];
        }
?>
    <h1>Gameplay</h1>
    <?php echo $_SESSION['content']?>
    <form method="post">
        <button type="submit" name="g_edit" class="btn btn-primary">Edit</button>
    </form>	
        
<?php	
	}else if(isset($_POST['g_edit'])){
?>
    <form method="post">
        <div class='form-group'>
            <label for='textgame'>Gameplay</label>
            <textarea class='form-control' name='textgame' id='textgame' rows='3'><?php echo $_SESSION['content']?></textarea>
        </div>
        <button type='submit' name='g_save' class='btn btn-primary'>Save</button>
    </form>
<?php    
    }else{
?>  
    <h1>Gameplay</h1>
    <?php echo $_SESSION['content']?>
<?php 
    }
?>