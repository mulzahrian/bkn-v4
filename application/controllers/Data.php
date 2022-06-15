<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'data');

        //$data['subMenu'] = $this->menu->getSubMenu();
        $data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
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
            $this->Menu_model->ubahDataLayanan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('menu/data');
        }
    }
    //detail
    public function detail_data()
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
    //hapus 
    public function hapus_data()
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
}
