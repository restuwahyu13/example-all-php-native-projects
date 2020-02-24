<?php

class App {

    protected $currentController = 'Home'; //default class controller
    protected $currentMethod = 'index'; //method deafult
    protected $params = [];

    public function __construct() {

       $url = $this->urlParse();

        // check controller di foldercontroller
        if(file_exists('../app/controllers/'.$url[0].'.php')){

            // jika controllernya tersedia replace dengan controller yang baru
            $this->currentController = $url[0];
            // hapus controller
            unset($url[0]);
        }

            //  ganti controller yang lama dengan controller yang baru
            require '../app/controllers/'.$this->currentController.'.php';

            //   instansiasi controller
            $this->currentController = new $this->currentController;


        if(isset($url[1])) {

            // check method dari controller
            if (method_exists($this->currentController, $url[1])) {

                // jika methodnya tersedia replace dengan method yang baru
                $this->currentMethod = $url[1];
                // hapus method
                unset($url[1]);
            }
        }

        // Get params - Any values left over in url are params
        $this->params = $url ? array_values($url) : [];

        //pangil class controllerr dan methodnya kirmkan parameternya
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function urlParse(){

        if(isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}