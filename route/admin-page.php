<header class="header-section"> 
    <?php
        
        require_once('data/database.php');
        include('template/navbar.php');
        if(connectDB()){
            if(isset($_SESSION['content'])){
                $updates = getPendingUpdates();
            }
            closeDB();
        }         
    ?>

</header>
<section class="section-main containter">
    <div id="accordion">
    <?php
        if(isset($updates)){
            foreach($updates as $content_updates){
    ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $content_updates['updateid']?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $content_updates['updateid']?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php 
                                    echo "Changes from user: " . $content_updates['uid'] . " " . $content_updates['timestamp'];
                                    $updatable = json_decode(file_get_contents($content_updates['updatepath']),true);
                                ?>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse<?php echo $content_updates['updateid']?>" class="collapse" aria-labelledby="heading<?php echo $content_updates['updateid']?>" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col-12">
                                <h1>Description</h1>
                            </div>
                            <div class="col-12">
                                <?php echo$updatable['desc']?>
                            </div>
                            <div class="col-12">
                                <h1>Gameplay</h1>
                            </div>
                            <div class="col-12">
                                <?php echo$updatable['game']?>
                            </div>
                            <div class="col-12">
                                <h1>Trivia</h1>
                            </div>
                            <div class="col-12">
                                <?php echo$updatable['triv']?>
                            </div>
                            <div class="col-12">
                                <h1>News and Events</h1>
                            </div>
                            <div class="col-12">
                                <?php echo$updatable['nwev']?>
                            </div>
                            <div class="col-12">
                                <img src="<?php echo$updatable['fimg']?>" alt="featured image">
                            </div>
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option1" autocomplete="off"> Accept
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option2" autocomplete="off"> Edit
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option3" autocomplete="off"> Reject
                            </label>
                        </div>
                    </div>
                    
                </div>
                
    <?php   
            }
        }else{
            echo "Nothing to display here. Move Along.";
        }
    ?>
    </div>
</section>
<footer class="footer-section">
    <?php include('template/footer.php'); ?>
</footer>