<?php
    function checkInputUsername($test){
        echo strlen($test);
        if(strlen($test)<5){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Username must be at least 5 characters long!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(preg_match('/\s/',$test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Username must not contain any white space!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
        }else{
            return 0;
        }
    }
    function checkInputPassword($test){
        
        if(strlen($test) < 8){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Password must be at least 8 characters long!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(!preg_match("#[0-9]+#",$test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Password must have at least 1 digit!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(!preg_match("#[A-Z]+#", $test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Password must have at least 1 uppercase character !</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(!preg_match("#[a-z]+#", $test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Password must have at least 1 lowercase character !</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
            
        }elseif(!preg_match("#[\W]+#",$test)) {
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Password must have at least 1 special character !</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else{
            return 0;
        } 
    }

?>