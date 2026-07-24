<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mboneka');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }

    public function index()
    {
        // $this->load->view("vdashboard");
        $this->load->view("template/head");
        $this->load->view("template/navbar");
        $this->load->view("template/sidebar");
        $this->load->view("template/content");
        $this->load->view("template/footer");
    }
    
    public function view_product()
{
    $data['produk'] = $this->Mboneka->get_product(); // asumsi kamu sudah ganti ke Mboneka
    $this->load->view("template/head");
    $this->load->view("template/navbar");
    $this->load->view("template/sidebar");
    $this->load->view("vproduct", $data);
    $this->load->view("template/footer");
}

public function get_product()
{
    return $this->db->get('produk')->result(); // pastikan tabelnya bernama "produk"
}

    // ========== AUTH ==========

    public function register()
    {
        $this->load->view('register');
    }

    public function register_user()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'email'      => $this->input->post('email'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );
        $this->Mboneka->insert_user($data);
        redirect('dashboard/login');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function login_user()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Mboneka->get_user_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'id'         => $user->id,
                'first_name' => $user->first_name,
                'email'      => $user->email,
                'logged_in'  => true
            ]);
            redirect('dashboard');
        } else {
            echo "Email atau password salah.";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['id', 'nama_depan', 'email', 'logged_in']);
        $this->session->set_flashdata('success', 'Anda berhasil logout!');
        redirect('dashboard/login');
    }


    public function forgot_password()
{
    $this->load->view('forgot_password');
}

public function forgot_password_action()
{
    $email = $this->input->post('email');

    // Contoh validasi: cek apakah email ada di database
    $user = $this->Mboneka->get_user_by_email($email);
    
    if ($user) {
        // Kirim email atau tampilkan pesan berhasil
        // (saat ini hanya flashdata sebagai contoh)
        $this->session->set_flashdata('message', 'Link reset password telah dikirim ke email Anda.');
    } else {
        $this->session->set_flashdata('message', 'Email tidak ditemukan dalam sistem.');
    }

    redirect('dashboard/forgot_password');
}



    // ========== PRODUK ==========

    public function product()
    {
        $data['produk'] = $this->Mboneka->get_product(); // sudah result() di model
        $this->load->view("template/head");
        $this->load->view("template/navbar");
        $this->load->view("template/sidebar");
        $this->load->view("vproduct", $data);
        $this->load->view("template/footer");
    }

    public function add_product()
    {
        $this->load->view("template/head");
        $this->load->view("template/navbar");
        $this->load->view("template/sidebar");
        $this->load->view("vadd");
        $this->load->view("template/footer");
    }

    public function save_product()
    {
        $config['upload_path']   = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|GIF|JPG|JPEG|PNG|WEBP';
        $config['max_size']      = 13000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
            return;
        } else {
            $file = $this->upload->data();
            $data = array(
                'nama_produk'      => $this->input->post('nama_produk'),
                'harga'     => $this->input->post('harga'),
                'stok'     => $this->input->post('stok'),
                'gambar'    => $file['file_name']
            );
            $this->Mboneka->add_product($data);
            redirect('dashboard/product');
        }
    }

    public function edit_product($id_produk)
    {
        $data['produk'] = $this->Mboneka->get_product_by_id($id_produk);
        $this->load->view("template/head");
        $this->load->view("template/navbar");
        $this->load->view("template/sidebar");
        $this->load->view("vedit", $data);
        $this->load->view("template/footer");
    }

    public function update_product()
{
    $id_produk = $this->input->post('id_produk');
    $produk = $this->Mboneka->get_product_by_id($id_produk);
    $gambar = $produk->gambar;

    if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/'; // ✅ perbaikan path
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|GIF|JPG|JPEG|PNG|WEBP';
        $config['max_size']      = 13000;
        $config['detect_mime']   = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        echo $_FILES['gambar']['type'];


        if ($this->upload->do_upload('gambar')) {
            $file = $this->upload->data();
            $gambar = $file['file_name'];
        } else {
            echo $this->upload->display_errors(); // tampilkan kenapa gagal
            return;
        }
    }

    $data = array(
        'nama_produk'      => $this->input->post('nama_produk'),
        'harga'     => $this->input->post('harga'),
        'stok'     => $this->input->post('stok'),
        'gambar'    => $gambar
    );

    $this->Mboneka->update_product($id_produk, $data);
    redirect('dashboard/view_product');
}


public function delete_product($id_produk)
{
    $this->load->model('Mboneka');
    $this->Mboneka->delete_product($id_produk);
    $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
    redirect('dashboard/view_product'); 
}

public function lihat_stok()
{
    $data['produk'] = $this->Mboneka->get_all_produk();
    $this->load->view('template/head');
    $this->load->view("template/navbar");
    $this->load->view('template/sidebar');
    $this->load->view('view_stok', $data);
    $this->load->view("template/footer");
}

public function view_pemasukan()
{
    $this->load->view('template/head');
    $this->load->view("template/navbar");
    $this->load->view('template/sidebar');
    $this->load->view('view_pemasukan');
    $this->load->view("template/footer");
}

public function view_pengeluaran()
{
    $this->load->view('template/head');
    $this->load->view("template/navbar");
    $this->load->view('template/sidebar');
    $this->load->view('view_pengeluaran');
    $this->load->view("template/footer");
}

    
}