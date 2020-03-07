<?php
	if(isset($_SESSION['log']) && !isset($_POST['n_edit'])){
        if(isset($_POST['n_save'])){
            $changes = true;
            $_SESSION['content']['nwev'] = $_POST['textne'];
        }
?>
    <form method="post">
        <div class="form-row">
            <div class='col-6'>
                <h1>News and Events</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="n_edit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="form-row">
            <?php echo$_SESSION['content']['nwev']?>
        </div>
    </form>	

<?php	
	}else if(isset($_POST['n_edit'])){
?>
    
    <form method="post">     
        <div class="form-row">
            <div class='col-6'>
                <h1>News and Events</h1>
            </div>
            <div class='col-6'>
                <button type="submit" name="n_save" class="btn btn-primary">Confirm Edit</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <textarea autofocus class='form-control' name='textne' id='textne' rows='7'><?php echo$_SESSION['content']['nwev']?></textarea>
            </div>
        </div>
    </form>
<?php    
    }else{
?>  
    <div class="row">
        <div class="col-12">
        <h1>News and Events</h1>
        </div>
        <div class="col-12">
            <?php echo$_SESSION['content']['nwev']?>
        </div>
    </div>    
<?php 
    }
?>