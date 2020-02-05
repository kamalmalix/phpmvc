<?php

class About extends Controller{
    public function index($nama= 'kamal', $pekerjaan = 'guru', $umur = 24){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About' ;
        $this->view('template/header', $data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }

    public function page(){
        $data['judul'] = 'Pages' ;
        $this->view('template/header', $data);
        $this->view('about/page', $data);
        $this->view('template/footer');
    }
}