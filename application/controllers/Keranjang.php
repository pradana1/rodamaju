<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends MY_Controller
{

    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {

            redirect(base_url());
            return;
        }
    }

    public function index($page = null)
    {
        $data['title'] = 'Keranjang Booking';
        $data['content']    = $this->keranjang->select(
            [
                'cart.id', 'cart.datebook', 'service.title', 'service.description'
            ]
        )
            ->join('service')
            ->where('cart.id_user', $this->id)
            ->get();
        $data['page'] = 'pages/keranjang/index';
        return $this->view($data);
    }



    public function add()
    {
        if (!$_POST) {
            $this->session->set_flashdata('error', 'Kuantitas tidak boleh kosong!');

            redirect(base_url());
        } else {
            $input              = (object) $this->input->post(null, true);


            $data = [
                'id_user'   => $this->id,
                'id_service' => $input->id_service,
            ];

            if ($this->keranjang->create($data)) {
                $this->session->set_flashdata('success', 'Service berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Oops! Terjado suatu kesalahann.');
            }


            redirect(base_url('/keranjang/index'));
        }
    }

    public function update($id)
    {
        if (!$_POST || $this->input->post('datebook') == '0000-00-00') {
            $this->session->set_flashdata('error', 'Tanggal Booking tidak boleh kosong!');

            redirect(base_url('keranjang/index'));
        }
        // elseif (!$_POST || $this->input->post('datebook') + '0000-00-02') {
        //     $this->session->set_flashdata('error', 'Tanggal uye tidak boleh kosong!');

        //     redirect(base_url('keranjang/index'));
        // }



        $data['content']        = $this->keranjang->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
            redirect(base_url('keranjang/index'));
        }

        $data['input']      = (object) $this->input->post(null, true);
        $this->keranjang->table  = 'service';

        $this->keranjang->where('id', $data['content']->id_service)->first();

        $cart               = [
            'datebook'   => $data['input']->datebook
        ];

        $this->keranjang->table  = 'cart';
        if ($this->keranjang->where('id', $id)->update($cart)) {
            $this->session->set_flashdata('success', 'Tanggal Service Berhasil Dibuat.');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjado suatu kesalahan.');
        }

        redirect(base_url('/keranjang/index'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('keranjang/index'));
        }

        if (!$this->keranjang->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('keranjang/index'));
        }

        if ($this->keranjang->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }

        redirect(base_url('keranjang/index'));
    }
}

/* End of file Cart.php */
