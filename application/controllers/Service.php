<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {

            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = null)
    {
        $data['title']      = 'Admin: Service';
        $data['content']    = $this->service->select(
            [
                'service.id', 'service.title AS service_title', 'category.title AS category_title'
            ]
        )
            ->join('category')
            ->paginate($page)
            ->get();

        $data['total_rows'] = $this->service->count();
        $data['pagination']   = $this->service->makePagination(
            base_url('service'),
            2,
            $data['total_rows']
        );
        $data['page']       = 'pages/service/index';

        $this->view($data);
    }



    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->service->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->service->validate()) {
            $data['title']          = 'Tambah Service';
            $data['input']          = $input;
            $data['form_action']    = base_url('service/create');
            $data['page']           = 'pages/service/form';

            $this->view($data);
            return;
        }

        if ($this->service->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('service'));
    }

    public function edit($id)
    {
        $data['content'] = $this->service->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('service'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }


        if (!$this->service->validate()) {
            $data['title']          = 'Ubah Service';
            $data['form_action']    = base_url("service/edit/$id");
            $data['page']           = 'pages/service/form';

            $this->view($data);
            return;
        }

        if ($this->service->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('service'));
    }

    public function delete($id)
    {
        if (!$_POST) {

            redirect(base_url('service'));
        }

        $service = $this->service->where('id', $id)->first();

        if (!$service) {
            $this->session->set_flashdata('warning', 'Maaf, Data tidak berhasil ditemukan');
            redirect(base_url('service'));
        }

        if ($this->service->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('service'));
    }

    public function unique_slug()
    {
        $slug   = $this->input->post('slug');
        $id     = $this->input->post('id');
        $service = $this->service->where('slug', $slug)->first();

        if ($service) {
            if ($id == $service->id) {
                return true;
            }

            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s Sudah Digunakan!');
            return false;
        }
        return true;
    }
}

/* End of file Product.php */
