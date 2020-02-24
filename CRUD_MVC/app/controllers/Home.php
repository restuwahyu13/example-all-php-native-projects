<?php

class Home extends Controller {

    public function index() {

       $data = [

           'title' => 'Home Page',
           'header-home' => 'Welcome to Home Page'
       ];

       $this->template('template/header', $data);
       $this->views('Home/index', $data);
       $this->template('template/footer');
   }

}