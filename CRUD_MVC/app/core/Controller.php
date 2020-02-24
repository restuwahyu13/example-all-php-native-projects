<?php

class Controller {

    //load data models
    public function model($model) {

       require '../app/models/'.$model.'.php';
       return new $model;
    }

    // load data views
    public function views($path, $data = []) {
        if(file_exists(require_once '../app/views/'.$path.'.php')) {
            require_once '../app/views/'.$path.'.php';
        }
    }

    //Load data template
    public function template($path, $data = []) {
        if(file_exists(require_once '../public/'.$path.'.php')) {
            require_once '../public/'.$path.'.php';
        }
    }
}
