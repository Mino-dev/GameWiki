<?php

    require_once('data/database.php');
    if(connectDB()){

        if(isset($_SESSION['content'])){
            $updates = getPendingUpdates();
        }
        if(isset($_POST['accept_yes'])&& isset($updates)  && isset($_SESSION['forupdate']) ){
            if($_SESSION['forupdate']){
                $acceptupdates = $updates[$_SESSION['admin_util']];
                if(isset($acceptupdates) && $acceptupdates !=null){
                    $dir = "data/stat_content/content.json";
                    $content = json_decode(file_get_contents($acceptupdates['updatepath']),true);
                    file_put_contents($dir,json_encode($content,JSON_PRETTY_PRINT));
                    $_SESSION['content'] = $content;
                    setUpdateTag(0,$acceptupdates['updateid']);
                    echo "<script type='text/javascript'> window.location='admin.php'; </script>";
                }
            }
        }else if(isset($_POST['edit_yes'])&& isset($updates) && isset($_SESSION['forupdate'])){
            if($_SESSION['forupdate']){
                $acceptupdates = $updates[$_SESSION['admin_util']];
                if(isset($acceptupdates) && $acceptupdates !=null){
                    $content = json_decode(file_get_contents($acceptupdates['updatepath']),true);
                    $_SESSION['content'] = $content;
                    $_SESSION['forupdate']=false;
                    echo "<script type='text/javascript'> window.location='index.php'; </script>";
                }
            }
        }else if(isset($_POST['reject_yes'])&& isset($updates) && isset($_SESSION['forupdate'])){
            if($_SESSION['forupdate']){
                $acceptupdates = $updates[$_SESSION['admin_util']];
                if(isset($acceptupdates) && $acceptupdates !=null){
                    $dir = "data/stat_content/content.json";
                    $content = json_decode(file_get_contents($dir),true);
                    $_SESSION['content'] = $content;
                    $_SESSION['forupdate']=false;
                    setUpdateTag(0,$acceptupdates['updateid']);
                    echo "<script type='text/javascript'> window.location='admin.php'; </script>";
                }

            }

        }else if(isset($_POST['revert_yes']) && isset($updates) && isset($_SESSION['forupdate'])){
            if($_SESSION['forupdate']){
                $dir = "data/stat_content/content.json";
                $content = json_decode(file_get_contents($dir), true);
                $_SESSION['content'] = $content;
                $_SESSION['forupdate']=false;
                echo "<script type='text/javascript'> window.location='admin.php'; </script>";
            }


        }

        closeDB();
    }

?>
<header class="header-section">
    <?php
        include('template/navbar.php');
    ?>
</header>
<section class="containter" style="min-height: 95vh; margin: 30px 0px;">
    <!-- Modal -->
    <div class="modal fade" id="acceptChanges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Do you want these changes applied to the main content?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This will load and save the changes permanently to the content.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="post">
                        <button type="submit" name="accept_yes" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editChanges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to edit the user's requested content?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This will load the data to current session.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="post">
                        <button type="submit" name="edit_yes" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="rejectChanges" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to reject the user's requested content?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This will reject the changes done by the user.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="post">
                        <button type="submit" name="reject_yes" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="revert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to revert to original content?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This will reload the content back to last save.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="post">
                        <button type="submit" name="revert_yes" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 15px 15px;">
        <button class="adminEdit" data-toggle="modal" data-target="#revert" value="-1">
                Revert to Original
        </button>
    </div>
    <div id="accordion" class="admin-updates" style="margin: 15px 0px;">
        <?php
            if(isset($updates) && $updates != null){

                foreach($updates as $key=>$content_updates){
        ?>
        <div class="card">
        <div style="margin: 10px 5px;">
            <div id="heading<?php echo $content_updates['updateid'];?>">
                <div class="card-header">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $content_updates['updateid'];?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php
                        echo "Changes from user: " . $content_updates['uid'] . " " . $content_updates['timestamp'];
                        $updatable = json_decode(file_get_contents($content_updates['updatepath']),true);
                    ?>
                </button>
                </div>
            </div>
            <div id="collapse<?php echo $content_updates['updateid'];?>" class="collapse" aria-labelledby="heading<?php echo $content_updates['updateid'];?>" data-parent="#accordion">       
                <div class="card-body">
                <div class="col-12">
                    <h1>Description</h1>
                </div>
                <div class="col-12">
                    <?php echo$updatable['desc'];?>
                </div>
                <div class="col-12">
                    <h1>Gameplay</h1>
                </div>
                <div class="col-12">
                    <?php echo$updatable['game'];?>
                </div>
                <div class="col-12">
                    <h1>Trivia</h1>
                </div>
                <div class="col-12">
                    <?php echo$updatable['triv'];?>
                </div>
                <div class="col-12">
                    <h1>News and Events</h1>
                </div>
                <div class="col-12">
                    <?php echo$updatable['nwev'];?>
                </div>
                <div class="col-12">
                    <h1>Featured Image</h1>
                </div>
                <div class="col-12">
                    <img src="<?php echo $updatable['fimg'];?>" alt="featured image" style="max-width: 90%; min-width: 80%;  margin:0 auto; height: auto;">
                </div>
                </div>
                <div class="card-footer">
                <button class="adminEdit" id="buttonAccept" data-toggle="modal" data-target="#acceptChanges" value="<?php echo $key;?>">
                    Accept
                </button>
                <button class="adminEdit" id="buttonEdit" data-toggle="modal" data-target="#editChanges" value="<?php echo $key;?>">
                    Edit
                </button>
                <button class="adminEdit" id="buttonReject" data-toggle="modal" data-target="#rejectChanges" value="<?php echo $key;?>">
                    Reject
                </button>
                </div>
            </div>
        </div>
        </div>
            <?php } ?>
        <?php
        }else{?>
            <div class="jumbotron jumbotron-fluid" style="margin: 30px;">
                <div class="container">
                    <h1 class="display-4">Nothing to Display Here</h1>
                    <p class="lead">Move Along :).</p>
                </div>
            </div>
        <?php      
        }
        ?>
    </div>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>
