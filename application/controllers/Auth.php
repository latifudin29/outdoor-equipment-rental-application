<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

        $this->load->model('Auth_model');
        $this->load->model('User_model');
    }
// =======================================Function Auth User=========================================
    // Login Function
    public function index()
    {

        if ($this->input->post('Login')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == true){
                $login = $this->Auth_model->getuser($this->input->post('username'));
                if ($login != null){
                    if(password_verify($this->input->post('password'), $login->pw_user) && $login->status == 1 && $login->valid_user == 1){
                        $data = [
                            'userid' => $login->id_user,
                            'fullname' => $login->fname_user,
                            'nik' => $login->nik_user,
                            'username' => $login->usrnm_user,
                            'email' => $login->email_user,
                            'alamat' => $login->addr_user,
                            'jeniskelamin' => $login->gnd_user,
                            'tempatlahir' => $login->tmplh_user,
                            'tanggallahir' => $login->tgl_user,
                            'nomerhp1' => $login->nohp1_user,
                            'nomerhp2' => $login->nohp2_user,
                            'ktp' => $login->img_ktp,
                            'kk' => $login->img_kk,
                            'avatar' => $login->img_user,
                            'type' => $login->type_user,
                            'status' => $login->status,
                            'validation' => $login->valid_user,
                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('msg', 'Anda Berhasil Login!');
                        redirect('page');
                    } else {
                        $this->session->set_flashdata('msg', 'Gagal Login!');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', 'Isikan Data yang Benar!');
            }

        }

        $data = [
            'title' => 'Login',
        ];

        $this->load->view('pages/auth/login.php', $data);
    }
    // Logout function
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('page');
    }
    // Register Function
    public function register()
    {
        if($this->input->post('submit')){
            // form validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[tb_users.usrnm_user]');
            $this->form_validation->set_rules('password', 'Password','required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_users.email_user]');
            $this->form_validation->set_rules('pass_confirm', 'Password Confirmation', 'required|matches[password]');
            
            if ($this->form_validation->run() == true){
                $this->Auth_model->regist();
                if ($this->db->affected_rows()>0){
                    $this->session->set_flashdata('msg', 'Registrasi Berhasil!');
                }
                redirect('auth');
            } else {
                $this->session->set_flashdata('msg', 'Registrasi Gagal!');
            }

        }

        // load Tampilan View
        $data = [
            'title' => 'Register',
        ];
        $this->load->view('pages/auth/register.php', $data);
    }

    public function respass()
    {
        // PHPMailer object
        
        // Form Validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
        array('required' => 'Email tidak boleh kosong !', 'valid_email' => 'Email tidak valid!'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong !'));
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', array('required' => 'Konfirmasi Password tidak boleh kosong !', 'matches[password]' => 'Konfirmasi Password tidak sesuai !'));
    
        if($this->form_validation->run() == true){
            $email = $this->input->post('email');
            $data = $this->User_model->getUserby($email);
            $new = $this->input->post('password');
            if($data->email_user != null){
                $response = false;
                $mail = new PHPMailer();
        
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jejaka.outdoor@gmail.com'; // user email anda
                $mail->Password = 'tnfazckuwsqlyerx'; // diisi dengan App Password yang sudah di generate
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;
        
                $mail->setFrom('jejaka.outdoor@gmail.com', 'Jejaka Outdoor Rent'); // user email anda
                $mail->addReplyTo('jejaka.outdoor@gmail.com', ''); //user email anda
        
                // Email subject
                $mail->Subject = 'New Password | Jejaka Outdoor'; //subject email
        
                // Add a recipient
                $mail->addAddress($data->email_user); //email tujuan pengiriman email
        
                // Set email format to HTML
                $mail->isHTML(true);
        
                // Email body content
                $mailContent = "<p><b>Password berhasil diubah!</b><br>Jangan beri tahu kepada siapapun Password Anda!. <br> Silahkan Login Kembali dengan Password baru Anda!</p>
                <br>
                <p>Terimakasih. <b>"; // isi email
                $mail->Body = $mailContent;
        
                // Send email
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $this->session->set_flashdata('msg', 'Perubahan Password Berhasil!');
                    $email_user = $data->email_user;
                    $this->Auth_model->newpass($new, $email_user);
                }
            } else {
                $this->session->set_flashdata('msg', 'Isikan form Email dengan benar !');
            }
        } else {
            $this->session->set_flashdata('msg', 'Terdapat kesalahan saat pengisian form Lupa Password!');
        }

        redirect('auth');
    }
    
    public function changepass()
    {
        // PHPMailer object
        
        // Form Validation
        $this->form_validation->set_rules('curpassword', 'Current Password', 'required',
        array('required' => 'Current Password tidak boleh kosong !'));
        $this->form_validation->set_rules('newpassword', 'New Password', 'required', array('required' => 'New Password tidak boleh kosong !'));
        $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[newpassword]', array('required' => 'Retype Password tidak boleh kosong !', 'matches[password]' => 'Retype Password tidak sesuai !'));
    
        if($this->form_validation->run() == true){
            $id = $this->input->post('userid');
            $data = $this->User_model->getUser($id);
            $new = $this->input->post('newpassword');
            $old = $this->input->post('curpassword');
                if(password_verify($old, $data->pw_user)){
                    $response = false;
                    $mail = new PHPMailer();
            
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'jejaka.outdoor@gmail.com'; // user email anda
                    $mail->Password = 'tnfazckuwsqlyerx'; // diisi dengan App Password yang sudah di generate
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;
            
                    $mail->setFrom('jejaka.outdoor@gmail.com', 'Jejaka Outdoor Rent'); // user email anda
                    $mail->addReplyTo('jejaka.outdoor@gmail.com', ''); //user email anda
            
                    // Email subject
                    $mail->Subject = 'New Password | Jejaka Outdoor'; //subject email
            
                    // Add a recipient
                    $mail->addAddress($data->email_user); //email tujuan pengiriman email
            
                    // Set email format to HTML
                    $mail->isHTML(true);
            
                    // Email body content
                    $mailContent = "<p><b>Password berhasil diubah!</b><br>Jangan beri tahu kepada siapapun Password Anda!. <br> Silahkan Login Kembali dengan Password baru Anda!</p>
                    <br>
                    <p>Terimakasih. <b>"; // isi email
                    $mail->Body = $mailContent;
            
                    // Send email
                    if (!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        $this->session->set_flashdata('msg', '<p style="color: green;">Perubahan Password Berhasil!</p>');
                        $email_user = $data->email_user;
                        $this->Auth_model->newpass($new, $email_user);
                        
                    }
                } else {
                    $this->session->set_flashdata('msg', '<p style="color: red;">Current Password Tidak Sesuai !</p>');
                }
        } else {
            $this->session->set_flashdata('msg', '<p style="color: red;">Terdapat Kekeliruan Pengisian Form!</p>');
        }
        redirect($this->agent->referrer());

    }

    public function editProfil()
    {
        $id = $this->input->post('id_user');
        $data = [
            'fname_user' => $this->input->post('fname_user'),
            'nik_user' => $this->input->post('nik_user'),
            'addr_user' => $this->input->post('addr_user'),
            'gnd_user' => $this->input->post('gnd_user'),
            'tmplh_user' => $this->input->post('tmplh_user'),
            'tgl_user' => $this->input->post('tgl_user'),
            'nohp1_user' => $this->input->post('nohp1_user'),
            'nohp2_user' => $this->input->post('nohp2_user'),
        ];
        $this->Auth_model->editData($data, $id);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('msd', 'Data Berhasil Diubah!');
        }
        redirect('page');
    }

    // Controller Test
    public function test()
    {
        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];

        $this->load->view('pages/auth/login.php/#forgotpass');
    }

    // Fungsi untuk mengganti avatar
    public function uploadfotoAv()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('id_user');
            $tag = $this->User_model->getUser($id);
            $config['upload_path']      = FCPATH.'/assets/upload/avatar/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']        = 1000;
            $config['max_width']      = 5000;
            $config['max_height']      = 5000;
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_user'))
            {
              $this->session->set_flashdata('msg', $this->upload->display_errors());
              redirect($this->agent->referrer());
            }
              else
            {
                if($tag->img_user !== "defaultav.png"){
                    unlink(FCPATH.'/assets/upload/avatar/' . $tag->img_user);
                }
                $filename = $this->upload->data('file_name');
                $this->User_model->uploadav($id, $filename);
                $this->session->set_flashdata('msg', 'Berhasil Upload Foto!');
                redirect($this->agent->referrer());
            }
        }
        
    }


// =======================================Function Auth Admin=========================================
    // Auth Admin
    public function auth_admin()
    {
        $data = [
            'title' => 'Admin Portal',
        ];

        if ($this->input->post('login') && $this->val_admin('login')) {
            $login = $this->Auth_model->getadmin($this->input->post('username'));
            if ($login != NULL) {
                if ($this->input->post('password') == $login->pw_admin) {
                    $data = array(
                        'userid' => $login->id_admin,
                        'username' => $login->usrnm_admin,
                        'fullname' => $login->nm_admin,
                        'keyword' => ''
                    );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">You are login !</p>');
                    redirect('admin/dashboard');
                }

            }
            $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Invalid username or password !</p>');
        }

        $this->load->view('admin/form_alogin', $data);
    }

    // Validation Admin
    public function val_admin($btn_name)
    {
        $this->load->library('form_validation');

        if ($btn_name == 'login') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        } else {
            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        }

        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }

    public function admlogout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }


    public function regist()
    {

        if ($this->input->post('submit') && $this->val_reg('submit')) {
            $var = $this->Auth_model->getuserby($this->input->post('email'));
            if ($var != NULL) {
                $this->session->set_flashdata('msg', '<p style="color : red">Your email has been registered!</p>');
                redirect('welcome');
            } else {
                $this->Auth_model->create();
                $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Check Your Email Address!</p>');
                redirect('welcome');
            }
            //$this->sendEmail();
        }
        $this->load->view('auth/form_register');
    }

    public function val_reg($input)
    {
        $this->load->library('form_validation');

        if ($input == 'submit') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('fullname', 'Fullname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');
        }

        if ($this->form_validation->run())
            return TRUE;
        else
            $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Your email has been registered!</p>');
        return FALSE;
    }
}
