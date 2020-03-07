<?php
	if(isset($_SESSION['log']) && !isset($_POST['t_edit'])){
        if(isset($_POST['t_save'])){
            $changes = true;
            $_SESSION['content']['triv'] = $_POST['texttriv'];
        }
?>  
    <form method="post">
        <div class="form-row">
            <div class='col-6'>
                <h1>Trivia</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="t_edit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="form-row">
            <?php echo$_SESSION['content']['triv']?>
        </div>
    </form>	

<?php	
	}else if(isset($_POST['t_edit'])){
?>
    
    <form method="post">     
        <div class="form-row">
            <div class='col-6'>
                <h1>Trivia</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="t_save" class="btn btn-primary">Confirm Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <textarea autofocus class='form-control' name='texttriv' id='texttriv' rows='7'><?php echo$_SESSION['content']['triv']?></textarea>
            </div>
        </div>
    </form>
<?php    
    }else{
?>  
    <div class="row">
        <div class="col-12">
        <h1>Trivia</h1>
        </div>
        <div class="col-12">
            <?php echo$_SESSION['content']['triv']?>
        </div>
    </div>    
<?php 
    }
?>