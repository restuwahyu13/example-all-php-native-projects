<?php

class Flash {

    public static function message($param = null, $value = null, $type = null) {

    $_SESSION['flash_msg'] = '<div class="alert '.$type.' alert-dismissible fade show" role="alert">
               <strong>'.$param.'</strong> '.$value.'.
               <button type="button" class="close" data-dismiss="alert">
               <span aria-hidden="true">&times;</span></button>
               </div>';

        if (isset($_SESSION)) $_SESSION['flash_msg'];
        if(time() > 1000) unset($_SESSION);
    }
}

