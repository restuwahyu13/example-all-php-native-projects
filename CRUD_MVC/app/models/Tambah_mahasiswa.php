<?php

class Tambah_mahasiswa extends Controller {

    private $conn, $dataPerhalaman, $jumlahData, $awalData, $halAktif, $dataPerpage, $cariData;

    public function __construct() {

        //init database
        $this->conn = new Database();
    }

    public function tampilkanData($params) {

        $this->conn->query("SELECT * FROM mahasiswa");
        $allResult = $this->conn->allResult();
        $this->dataPerhalaman = 5;
        $this->jumlahData = count($allResult);
        $this->dataPerpage = ceil($this->jumlahData / $this->dataPerhalaman);
        $this->halAktif = (isset($params)) ? (int) $params : 1;
        $this->awalData = ($this->halAktif - 1) * $this->dataPerhalaman;
        $this->conn->query("SELECT * FROM mahasiswa LIMIT $this->awalData, $this->dataPerhalaman");


        //get fungsi pagination default
        $result = [];
        $result['pageData'] = $this->conn->allResult();
        $result['dataPerpage'] = $this->dataPerpage;
        $result['halAktif'] = $this->halAktif;
        $result['prev'] = $this->halAktif - 1;
        $result['next'] = $this->halAktif + 1;
        $result['right_link'] = 1;
        $result['left_link'] = $this->dataPerpage;
        $result['limitPage'] = ceil(($this->jumlahData / $this->dataPerpage) + $this->halAktif);

        return $result;

    }

    public function tambahData($data) {

        $query = "INSERT INTO mahasiswa VALUES ('',:nama, :npm, :fakultas, :kejuruan)";

        $this->conn->query($query);
        $this->conn->bindVal('nama', $data['nama']);
        $this->conn->bindVal('npm', $data['npm']);
        $this->conn->bindVal('fakultas', $data['fakultas']);
        $this->conn->bindVal('kejuruan', $data['kejuruan']);
        $this->conn->execute();

       return $this->conn->rowCount();
    }

    public function hapusData($id) {

        $sql = "DELETE FROM mahasiswa WHERE id = :id";
        $this->conn->query($sql);
        $this->conn->bindVal('id', $id);
        $this->conn->execute();

        return $this->conn->rowCount();
    }
    
    public function pilihData($id) {
        
        $sql = "SELECT * FROM mahasiswa WHERE id = :id";
        $this->conn->query($sql);
        $this->conn->bindVal('id', $id);
        return $this->conn->allResult();
    }

    public function perbaruiData($data) {

        $sql = "UPDATE mahasiswa SET
                 nama = :nama, 
                 npm = :npm, 
                 fakultas = :fakultas, 
                 kejuruan = :kejuruan 
                 WHERE id = :id ";

        $this->conn->query($sql);
        $this->conn->bindVal('id', $data['id']);
        $this->conn->bindVal('nama', $data['nama']);
        $this->conn->bindVal('npm', $data['npm']);
        $this->conn->bindVal('fakultas', $data['fakultas']);
        $this->conn->bindVal('kejuruan', $data['kejuruan']);
        return $this->conn->execute();
    }

    public function pageData($page) {

        $this->conn->query("SELECT * FROM mahasiswa");
        $allResult = $this->conn->allResult();
        $this->dataPerhalaman = 5;
        $this->jumlahData = count($allResult);
        $this->dataPerpage = ceil($this->jumlahData / $this->dataPerhalaman);
        $this->halAktif = (isset($page)) ? (int) $page : 1;
        $this->awalData = ($this->halAktif - 1) * $this->dataPerhalaman;
        $this->conn->query("SELECT * FROM mahasiswa LIMIT $this->awalData, $this->dataPerhalaman");

        //get fungsi pagination
        $result = [];
        $result['pageData'] = $this->conn->allResult();
        $result['dataPerpage'] = $this->dataPerpage;
        $result['halAktif'] = $this->halAktif;
        $result['prev'] = $this->halAktif - 1;
        $result['next'] = $this->halAktif + 1;
        $result['right_link'] = 1;
        $result['left_link'] = $this->dataPerpage;
        $result['limitPage'] = ceil(($this->jumlahData / $this->dataPerpage) + $this->halAktif);

        return $result;

    }

    public function searchData() {

        $this->cariData = $_POST['cari'];
        $this->conn->query("SELECT * FROM mahasiswa WHERE nama LIKE '%".$this->cariData."%' ");
        return $this->conn->allResult();

    }
}