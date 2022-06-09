<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    //Layanan

    public function layanan()
    {
        $data['title'] = 'Layanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'layanan');

        
        $data['layanan'] = $this->Menu_model->get_layanan()->result_array();

        $this->form_validation->set_rules('nip', 'Title', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('satker', 'Satker', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('kepentingan', 'Kepentingan', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('counter', 'Counter', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/layanan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'slug' => $this->input->post('slug'),
                'satker' => $this->input->post('satker'),
                'instansi' => $this->input->post('instansi'),
                'kepentingan' => $this->input->post('kepentingan'),
                'nohp' => $this->input->post('nohp'),
                'layanan' => $this->input->post('layanan'),
                'counter' => $this->input->post('counter')
            ];
            $this->db->insert('layanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Ditambahkan!</div>');
            redirect('menu/layanan');
        }
    }

    public function update_1($id)
    {
        $this->Menu_model->update_1($id);
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('menu/layanan');
    }

    public function update_2($id)
    {
        $this->Menu_model->update_2($id);
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('menu/layanan');
    }
    //data

    public function data()
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'data');

        //$data['subMenu'] = $this->menu->getSubMenu();
        $data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/data', $data);
            $this->load->view('templates/footer');

    }

    //ubah
    public function ubah($id)
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Menu_model->getLayananById($id);  

        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/data_ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataLayanan($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('menu/data');
        }

    }
    //detail
    public function detail_data($id)
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Menu_model->getLayananById($id);  


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/data_detail', $data);
            $this->load->view('templates/footer');
        

    }
    //hapus 

    public function hapus($id)
    {
        $this->Menu_model->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu/data');
    }
    

    //display

    public function display()
    {
        $data['title'] = 'Display';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'display');

        //$data['subMenu'] = $this->menu->getSubMenu();
        $data['display'] = $this->db->get('display')->result_array();

        $this->form_validation->set_rules('quotes', 'quotes', 'required');
        $this->form_validation->set_rules('video', 'video', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/display', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'quotes' => $this->input->post('quotes'),
                'video' => $this->input->post('video')
            ];
            $this->db->insert('display', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Ditambahkan!</div>');
            redirect('menu/display');
        }
    }

    //Counter

    public function counter()
    {
        $data['title'] = 'Counter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'counter');

        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/counter', $data);
            $this->load->view('templates/footer');
    }

    public function counter_a()
    {
        $data['title'] = 'Counter-A';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'counter');

        $data['counter'] = $this->Menu_model->get_counter_a()->result_array();
        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
            //$this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/counter-A', $data);
            $this->load->view('templates/footer');
    }

    
}
