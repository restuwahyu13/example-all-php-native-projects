<?php

class Mahasiswa extends Controller {

    //tampilkan data mahasiswa
    public function index($start = 1) {

        //init fungsi default pagination
        $query = $this->model('Tambah_mahasiswa')->tampilkanData($start);
        //sending data to views
        $data = [
            'title' => 'Mahasiswa Page',
            'table' => $query['pageData'],
            'dataPage' => $query['dataPerpage'],
            'halAktif' =>  $query['halAktif'],
            'prev' => $query['prev'],
            'next' => $query['next'],
            'right' => $query['right_link'],
            'left' => $query['left_link'],
            'limit' => $query['limitPage']
        ];

        $this->template('template/header', $data);
        $this->views('mahasiswa/index', $data);
        $this->template('template/footer');
    }

    //tambah data mahasiswa
    public function tambah() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') :

                if($this->model('Tambah_mahasiswa')->tambahData($_POST) > 0) {
                 Flash::message('data berhasil', 'ditambahkan', 'alert-success');
                    redirect('mahasiswa');
                    exit;
                }

        endif;
    }

    //hapus data mahasiswa
    public function hapus($id) {

        if($this->model('Tambah_mahasiswa')->hapusData($id) > 0) {
            Flash::message('data berhasil', 'dihapus', 'alert-danger');
            redirect('mahasiswa');
            exit;
        }
    }

    public function pilih($id) {

        $data['title'] = 'Mahasiswa Page';
        $data['pilih'] = $this->model('Tambah_mahasiswa')->pilihData($id);

        $this->template('template/header', $data);
        $this->views('mahasiswa/form_update', $data);
        $this->template('template/footer');
    }

    public function perbarui() {

        if($this->model('Tambah_mahasiswa')->perbaruiData($_POST)) {

            Flash::message('data berhasil', 'diperbarui', 'alert-success');
            redirect('mahasiswa');
            exit;
        }
    }

    public function page($param) {

        //init pagination data
        $query = $this->model('Tambah_mahasiswa')->pageData($param);
        //sending data to views
        $data = [

            'title' => 'Mahasiswa Page',
            'table' => $query['pageData'],
            'dataPage' => $query['dataPerpage'],
            'halAktif' => $query['halAktif'],
            'prev' => $query['prev'],
            'next' => $query['next'],
            'right' => $query['right_link'],
            'left' => $query['left_link'],
            'limit' => $query['limitPage']
        ];

        $this->template('template/header', $data);
        $this->views('mahasiswa/pagination', $data);
        $this->template('template/footer');
    }

    public function search() {

        //sending data to views
        $data = [

            'title' => 'Mahasiswa Page',
            'table' => $this->model('Tambah_mahasiswa')->searchData()
        ];

        $this->template('template/header', $data);
        $this->views('mahasiswa/index', $data);
        $this->template('template/footer');

    }

}//end class