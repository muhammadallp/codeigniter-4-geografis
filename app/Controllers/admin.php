<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\product_Model;
use App\Models\Dashboard_model;
use App\Models\barangbekas_model;
use \Dompdf\Dompdf;


class admin extends BaseController
{
    
    protected $userModal;
    public function __construct()
    {
        $this->userModel = new UserModel();
 
        $this->dashboard_model = new Dashboard_model();
        $this->barangbekas_model = new barangbekas_model();

     
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {

        if(!$this->session->get('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
    

        $title=[
            'title' =>'Dashboard | Rongsokan',
            'brg_bekas' =>$this->dashboard_model->getCountbarangbekas(),
            'total_product' =>$this->dashboard_model->getCountProduct(),
            'total_category'=>$this->dashboard_model->getCountCategory(),
            'total_user' =>$this->dashboard_model->getCountUser(),
            'total_penjualan' =>$this->dashboard_model->getCountPenjualan(),
        ];       
        return view('admin/index',$title);
        
    }

    public function datauser()
    {

        
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $user= $this->userModel->findAll();
        $title=[
            'title' =>'datauser | Rongsokan',
            'user' =>$user
        ];
        //menampilkan halaman login
        return view('admin/datauser',$title);
    }
    

    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->userModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('admin/datauser');
    }
   

    public function pesanan()
    {
        $this->userModel = new product_Model();

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new Product_model();
        $data=[
        'title' =>'Data Pesanan | Rongsokan',
        'product' => $model->getProduct()->getResult(),
        'penjualan' => $model->getpenjualan()->getResult(),
         'pelanggan'=> $model->getpelanggan()->getResult(),
         'brg_bekas'=> $model->getbarangbekas()->getResult(),
        ];
        return view('admin/pesanan', $data);
    }

    public function printpdf(){
        $dompdf=new Dompdf();
        $this->userModel = new product_Model();

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new Product_model();
        $data=[
        'title' =>'Print PDF| Rongsokan',
        'product' => $model->getProduct()->getResult(),
        'penjualan' => $model->getpenjualan()->getResult(),
         'pelanggan'=> $model->getpelanggan()->getResult(),
         'brg_bekas'=> $model->getbarangbekas()->getResult(),
        ];
        $html= view('admin/printpdf', $data);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Pesanan.pdf', array(
            "Attachment" =>false
        ));

    }
    public function pesan()
    {
        //cek apakah ada session bernama isLogin

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('user/pesan');
        }
        //cek role dari session
        $model = new Product_model();
        $barangbekas= $this->barangbekas_model->findAll();
        $title=[
            'title' =>'Pesan | Rongsokan',
            'pelanggan'=> $model->getpelanggan()->getResult(),
            'barangbekas' =>$barangbekas

        ];       
        return view('admin/mapjs',$title);
    }
        
    
    
}