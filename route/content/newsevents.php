<?php
	if(isset($_SESSION['log']) && !isset($_POST['n_edit'])){
        if(isset($_POST['n_save'])){
            $_SESSION['content'] = $_POST['textne'];
        }
?>
    <h1>News and Events</h1>
    <?php echo $_SESSION['content']?>
    <form method="post">
        <button type="submit" name="n_edit" class="btn btn-primary">Edit</button>
    </form>	
        
<?php	
	}else if(isset($_POST['n_edit'])){
?>
    <form method="post">
        <div class='form-group'>
            <label for='textne'>News and Events</label>
            <textarea class='form-control' name='textne' id='textne' rows='3'><?php echo $_SESSION['content']?></textarea>
        </div>
        <button type='submit' name='n_save' class='btn btn-primary'>Save</button>
    </form>
<?php    
    }else{
?>  
    <h1>News and Events</h1>
    <?php echo $_SESSION['content']?>
<?php 
    }
?>