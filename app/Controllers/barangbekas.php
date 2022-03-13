<?php

namespace App\Controllers;
use App\Models\barangbekas_model;
use \Dompdf\Dompdf;


class barangbekas extends BaseController
{
    protected $barangbekas_model;
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->barangbekas_model = new barangbekas_model();
        
        //meload validation
        // $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }
    
    public function index()
    {

        
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
        $title=[
            'title' =>'Barangbekas | Rongsokan',
            'barangbekas' =>$this->barangbekas_model->findAll(),
            'validation' => \Config\Services::validation()
        ];
        //menampilkan halaman 
        return view('barangbekas/index',$title);
    }

    public function save()
    {
        $filegambar = $this->request->getFile('image');
        if ($filegambar->getError() == 4) {
            $namagambar = 'default.jpg';
        } else {
            $namagambar = $filegambar->getName();
            // $namagambar = $filegambar->getRandomName();
            $filegambar->move('assets/image/barangbekas/', $namagambar);
        } 
        $lat =$this->request->getVar('latitude');
        $lng =$this->request->getVar('longitude');

       $this->barangbekas_model->save([
           'nama' => $this->request->getVar('nama'),
           'nohp' => $this->request->getVar('nohp'),
           'latitude' => $lat,
           'longitude' => $lng,
           'data_create' => date('Y-m-d'),
           'image' => $namagambar,
        
       ]);

       session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Tambahkan!
      </div>');
       return redirect()->to('barangbekas');
    }

    public function edit($id)
    {
        $filegambar = $this->request->getFile('image');
        if ($filegambar->getError() == 4) {
            $namagambar =$this->request->getVar('gambarlama');
        }else{
            $namagambar = $filegambar->getName();
            $filegambar->move('assets/image/barangbekas/', $namagambar);
            unlink('assets/image/barangbekas/'.$this->request->getVar('gambarlama'));
        }
        $data=[
            'nama' => $this->request->getVar('nama'),
            'nohp' => $this->request->getVar('nohp'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'data_create' => $this->request->getVar('data_create'),
            'image'=>$namagambar

        ];
        $this->barangbekas_model->edit_data($data,$id);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Diedit!
      </div>');
       return redirect()->to('barangbekas');
        
    }



    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $barangbekas=$this->barangbekas_model->find($id);

        
            unlink('assets/image/barangbekas/'.$barangbekas['image']);
     
         $this->barangbekas_model->deletebarang($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('barangbekas');
    }


    public function tambahdata()
    {
        //cek apakah ada session bernama isLogin

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('user/pesan');
        }
        //cek role dari session
        $barangbekas= $this->barangbekas_model->findAll();
        $title=[
            'title' =>'Pesan | Rongsokan',
            'barangbekas' =>$barangbekas

        ];       
        return view('barangbekas/tambahdata',$title);
    }


    public function printpdf(){
        $dompdf=new Dompdf();

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

       
        $data=[
        'title' =>'Print PDF| Rongsokan',
        // 'product' => $model->getProduct()->getResult(),
        // 'penjualan' => $model->getpenjualan()->getResult(),
        //  'pelanggan'=> $model->getpelanggan()->getResult(),
        'barangbekas' =>$this->barangbekas_model->findAll(),
        ];
        $html= view('barangbekas/printpdf', $data);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Pesanan.pdf', array(
            "Attachment" =>false
        ));

    }
 
}