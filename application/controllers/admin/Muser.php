<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Muser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

        $this->load->model('User_model');
    }

    // Get All Data Kontrol
    public function index()
    {
        if($this->input->post('search')){
            $keyword = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        $this->db->like('usrnm_user', $keyword);
        $this->db->or_like('email_user', $keyword  );
        $this->db->from('tb_users');
        $config['base_url'] = 'http://localhost:80/jejaka-app/admin/Muser/index/';
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;

        $this->pagination->initialize($config);
        $start = $this->uri->segment(4);
        $data = [
            'start' => $this->uri->segment(4),
            'title' => 'Users',
            'users' => $this->User_model->getAllpage($config['per_page'], $start, $keyword),
            'block_users' => $this->User_model->block_users()
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/musers/list_user', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Add Data User
    public function addUser()
    {
        if ($this->input->post('submit')) {
            $this->User_model->insData();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully added ! </p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User Add failed ! </p>');
            }
            redirect('admin/muser');
        }
        $data = [
            'title' => 'Add User'
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/musers/form_user', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Edit Data User
    public function editUser($id)
    {
        if ($this->input->post('submit')) {
            $this->User_model->uptData($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully added ! </p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User Add failed ! </p>');
            }

            redirect('admin/muser');
        }
        $data = [
            'title' => 'Edit User',
            'user' => $this->User_model->getUser($id),
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        return $this->load->view('admin/musers/form_user', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Delete Data User
    public function delUser($id)
    {
        $this->User_model->delData($id);
        return redirect('admin/muser');
    }

    // View Detail User
    public function viewUser($id)
    {
        $data = [
            'user' => $this->User_model->getUser($id),
            'title' => 'View User Detail'
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        return $this->load->view('admin/musers/view_user', $data);
        $this->load->view('admin/partial/afooter');
    }

    // Block User
    public function block($id)
    {
        $this->User_model->updatblock($id);
        redirect('admin/muser');
    }

    // UnBlock User
    public function unblock($id)
    {
        $this->User_model->updatunblock($id);
        redirect('admin/muser');
    }

    public function validation($id)
    {
        $this->User_model->updateval($id);
        $this->sendmail($id);
        redirect('admin/muser');
    }

    // Unvalidation User
    public function unvalidation($id)
    {
        $this->User_model->updateunval($id);
        redirect('admin/muser');
    }


    private function sendmail($id)
    {
        // PHPMailer object
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $data = $this->User_model->getUser($id);


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
        $mail->Subject = 'Selamat Anda telah Menjadi Member Jejaka Outdoor! | Jejaka Outdoor'; //subject email

        // Add a recipient
        $mail->addAddress($data->email_user); //email tujuan pengiriman email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<p>Hallo <b>" . $data->fname_user . "</b> Selamat Anda telah terdaftar sebagai anggota Member Jejaka Outdoor! Silahkan lengkapi kembali profil data Anda seperti KTP dan KK supaya kamu bisa booking dimana aja!</p>
        <br>
        <p>Terimakasih. <b>"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
    public function custSendmail($id)
    {
        
        $response = false;
        $mail = new PHPMailer();
        if ($this->input->post('submit')) {
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
            $mail->Subject = $this->input->post('subject'); //subject email

            // Add a recipient
            $mail->addAddress($this->input->post('address')); //email tujuan pengiriman email

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mailContent = $this->input->post('content'); // isi email
            $mail->Body = $mailContent;

            // Send email
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                redirect('admin/muser');
            }
        }
        // PHPMailer object
        $data = [
            'title' => 'Send Mail',
            'user' => $this->User_model->getUser($id)
        ];
        if (! $this->session->userdata('username')) redirect('auth/auth_admin');
        $this->load->view('admin/partial/ahead', $data);
        $this->load->view('admin/partial/anavbar');
        $this->load->view('admin/musers/form_mail', $data);
        $this->load->view('admin/partial/afooter');
    }
}
