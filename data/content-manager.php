<?php 
    if(isset($_SESSION['log'])){
        if(isset($_POST['consave'])&&isset($_SESSION['content'])){
            file_put_contents("data/content-json/JSON_SAMPLE.json",json_encode($_SESSION['content'],JSON_PRETTY_PRINT));
        }
    if($changes){
?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveChanges">
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
                        <button type="submit" name="consave" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}

?>