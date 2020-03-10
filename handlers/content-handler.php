<?php 
    
    if(isset($_SESSION['log'])){
        if(isset($_POST['consave'])&&isset($_SESSION['content'])){	
            if($_SESSION['client']['utype'] == 0){
                $dir = "data/stat_content/content.json";
                file_put_contents($dir,json_encode($_SESSION['content'],JSON_PRETTY_PRINT));  
                $_SESSION['changes'] = false;
            }else{
                $temp_time=time();
                $dir = "data/dyn_content/content" . $temp_time . "copy.json";
                file_put_contents($dir,json_encode($_SESSION['content'],JSON_PRETTY_PRINT));
                $uid = $_SESSION['client']['uid'];  
                if(!insertContent($dir, $uid)){
                    echo "fail to update";
                }else{
                    $_SESSION['changes'] = false;
                }
            }   
        }          
?>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveChanges" <?php 
        if(!$_SESSION['changes'] && $_SESSION['client']['utype'] != 0){
            echo "disabled"; 
        }
    ?>>
        Save Changes
    </button>

    <!-- Modal -->
    <div class="modal fade" id="saveChanges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form method="post">
                        <button id= 'consave' type="submit" name="consave" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>