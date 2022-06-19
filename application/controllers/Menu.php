<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('dompdf_gen');
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
        if( $this->input->post('keyword') ) {
            $data['data'] = $this->Menu_model->cariData();
        }

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

    //excel
    public function excel()
    {
        $data['data'] = $this->Menu_model->tampil_data('layanan')->result();

	    
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');


        $object = new PHPExcel();

        $object->getProperties()->setCreator("Zahra");
        $object->getProperties()->setLastModifiedBy("Zahra");
        $object->getProperties()->setTitle("Daftar Data Layanan");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1','NO');
        $object->getActiveSheet()->setCellValue('B1','Nip');
        $object->getActiveSheet()->setCellValue('C1','Nama');
        $object->getActiveSheet()->setCellValue('D1','Slug');
        $object->getActiveSheet()->setCellValue('E1','Satker');
        $object->getActiveSheet()->setCellValue('F1','Instansi');
        $object->getActiveSheet()->setCellValue('G1','Kepentingan');
        $object->getActiveSheet()->setCellValue('H1','No Hp');
        $object->getActiveSheet()->setCellValue('I1','Layanan');
        $object->getActiveSheet()->setCellValue('J1','Counter');

        $baris = 2;
        $no = 1;

        foreach ($data['data'] as $mds) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $mds->nip);
            $object->getActiveSheet()->setCellValue('C'.$baris, $mds->nama);
            $object->getActiveSheet()->setCellValue('D'.$baris, $mds->slug);
            $object->getActiveSheet()->setCellValue('E'.$baris, $mds->satker);
            $object->getActiveSheet()->setCellValue('F'.$baris, $mds->instansi);
            $object->getActiveSheet()->setCellValue('G'.$baris, $mds->kepentingan);
            $object->getActiveSheet()->setCellValue('H'.$baris, $mds->nohp);
            $object->getActiveSheet()->setCellValue('I'.$baris, $mds->layanan);
            $object->getActiveSheet()->setCellValue('J'.$baris, $mds->counter);
            $baris++;
        }
    $filename="Data".'.xlsx';
    $object->getActiveSheet()->setTitle("Data");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    $writer->save('php://output');
    exit;
    }

    //pdf
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['data'] = $this->db->get('layanan')->result_array();
        
        $this->load->view('menu/pdf', $data);

        $paper_size = 'A5';
        $orientation = 'portrait';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array('attachment' =>0));   
}


    //display

    public function display()
    {
        $data['title'] = 'Display';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'display');

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

    //display

    public function ubah_display($id)
    {
        $data['title'] = 'Ubah Display';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->Menu_model->getDisplayById($id);

        $this->form_validation->set_rules('quotes', 'quotes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/display_ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataDisplay($id);
            $this->session->set_flashdata('flash', 'Diubah');
            //
            // $name = $this->input->post('name');
            // $email = $this->input->post('email');

            // // cek jika ada gambar yang akan diupload
            // $upload_image = $_FILES['image']['name'];

            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png';
            //     $config['max_size']      = '2048';
            //     $config['upload_path'] = './assets/img/profile/';

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('image')) {
            //         $old_image = $data['user']['image'];
            //         if ($old_image != 'default.jpg') {
            //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
            //         }
            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('image', $new_image);
            //     } else {
            //         echo $this->upload->dispay_errors();
            //     }
            // }

            // $this->db->set('name', $name);
            // $this->db->where('email', $email);
            // $this->db->update('user');

            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            // redirect('user');

            //
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

        $data['display'] = $this->Menu_model->get_display()->result_array();
        $data['counter'] = $this->Menu_model->get_counter_a()->result_array();
        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/counter-A', $data);
        $this->load->view('templates/footer');
    }
    public function counter_b()
    {
        $data['title'] = 'Counter-B';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'counter');

        $data['display'] = $this->Menu_model->get_display()->result_array();
        $data['counter'] = $this->Menu_model->get_counter_b()->result_array();
        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/counter-B', $data);
        $this->load->view('templates/footer');
    }
    public function counter_c()
    {
        $data['title'] = 'Counter-C';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'counter');

        $data['display'] = $this->Menu_model->get_display()->result_array();
        $data['counter'] = $this->Menu_model->get_counter_c()->result_array();
        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/counter-C', $data);
        $this->load->view('templates/footer');
    }
    public function counter_d()
    {
        $data['title'] = 'Counter-D';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'counter');

        $data['display'] = $this->Menu_model->get_display()->result_array();
        $data['counter'] = $this->Menu_model->get_counter_d()->result_array();
        //$data['subMenu'] = $this->menu->getSubMenu();
        //$data['data'] = $this->db->get('layanan')->result_array();

        $this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/counter-D', $data);
        $this->load->view('templates/footer');
    }
}
