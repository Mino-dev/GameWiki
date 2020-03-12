<?php
    function simpleEmailCheck($test){
        return filter_var($test, FILTER_VALIDATE_EMAIL);
    }
    function checkInputUsername($test){
        if(strlen($test) < 4||preg_match('/\s/',$test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Username must be at least 4 characters long and must not contain any white space!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Username can only contain underscore as a special character!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else{
            return 0;
        }
    }
    function checkValidFileExtension($extension){
        $valid_extensions = array("jpg","jpeg","png","gif");
        return in_array($extension,$valid_extensions);
    }
    function checkInputPassword($test, $string = ""){
        
        if(strlen($test)<8||preg_match('/\s/',$test)){
            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>".$string."Password must be at least 8 characters long with no white spaces</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else if(!preg_match("#[0-9]+#",$test)||
                 !preg_match("#[A-Z]+#", $test)||
                 !preg_match("#[a-z]+#", $test)||
                 !preg_match("#[\W]+#",$test)){

            return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>".$string."Password must have at least one digit, uppercase character, lowercase character and special character!</strong>. 
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"; 
        }else{
            return 0;
        } 
    }

?>