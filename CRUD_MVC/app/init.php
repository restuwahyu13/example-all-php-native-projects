<?php

//load init database
require_once '../app/config/config.php';
//load data helpers
require_once '../app/helpers/url_helpers.php';
//load flash message
require_once '../app/helpers/Flash.php';

//load otomatis semua kelas di core folder
spl_autoload_register(function ($className) {
      require_once 'core/'.$className.'.php';
});