<?php

class About extends Controller {

    public function index() {

        $data = [

            'title' => 'About Page',
            'header-about' => 'Welcome to About Page'
        ];

        $this->template('template/header', $data);
        $this->views('About/index', $data);
        $this->template('template/footer');

    }

}