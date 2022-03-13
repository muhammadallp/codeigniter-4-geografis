<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }
    
    public function login()
    {
        if($this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        $title=[
            'title' =>'Login | Rongsokan'
        ];
        //menampilkan halaman login
        return view('auth/login',$title);
    }
    
    public function register()
    {
        if($this->session->get('isLogin')){
            return redirect()->to('/user');
        }
        $title=[
            'title' =>'Register | Rongsokan'
        ];
        //menampilkan halaman register
        return view('auth/register',$title);
    }
    
    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();
        
        //jalankan validasi
        $this->validation->run($data, 'register');
        
        //cek errornya
        $errors = $this->validation->getErrors();
        
        //jika ada error kembalikan ke halaman register
        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('/auth/register');
        }
        
        //jika tdk ada error 
        
        //buat salt
        $salt = uniqid('', true);
        
        //hash password digabung dengan salt
        $password = md5($data['password']).$salt;
        
        //masukan data ke database
        $this->userModel->save([
            'username' => htmlspecialchars( $data['username']),
            'password' => $password,
            'nama' => htmlspecialchars( $data['nama']),
            'role' => 2,
            'salt' => $salt,
            'image'=>'default.jpg',
            'data_create'=>date('Y-m-d')

            ]);
        
        //arahkan ke halaman login
        session()->setFlashdata('login', '<div class="alert alert-success" role="alert">
        You have successfully registered! please login
      </div>');
        return redirect()->to('/auth/login');
    }
    
    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('username', $data['username'])->first();
        
        //cek apakah username ditemukan
        if($user){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if($user['password'] != md5($data['password']).$user['salt']){
                session()->setFlashdata('password', '<div class="alert alert-danger" role="alert">
                password wrong
              </div>');
                return redirect()->to('/auth/login');
            }
            else{
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'nama' => $user['nama'],
                    'image'=> $user['image'],
                    'role' => $user['role'],
                    // 'data_created'=>date('d F Y',$user['data_created'])
                    ];
                $this->session->set($sessLogin);
                return redirect()->to('/admin');
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username','<div class="alert alert-danger" role="alert">
            username not found
          </div>');
            return redirect()->to('/auth/login');
        }
    }
    
    public function logout()
    {
       
      //hancurkan session 
      $this->session->destroy();
        //balikan ke halaman login

        session()->setFlashdata('logout','<div class="alert alert-danger" role="alert">
        anda berhasil logout
      </div>');
        return redirect()->to('/auth/login');

    }
   
}