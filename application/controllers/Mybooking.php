<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mybooking extends MY_Controller
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

    public function index()
    {
        $data['title']      = 'Data Booking';
        $data['content']    = $this->mybooking->where('id_user', $this->id)->orderBy('date', 'DESC')->get();

        $data['page']       = 'pages/mybooking/index';

        $this->view($data);
    }

    public function detail($invoice)
    {
        $data['booking']      = $this->mybooking->where('invoice', $invoice)->first();
        if (!$data['booking']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('/mybooking'));
        }

        $this->mybooking->table       = 'bookings_detail';
        $data['booking_detail']       = $this->mybooking->select([
            'bookings_detail.id_bookings', 'bookings_detail.id_service', 'bookings_detail.datebook', 'service.title',
        ])
            ->join('service')
            ->where('bookings_detail.id_bookings', $data['booking']->id)
            ->get();


        if ($data['booking']->status !== 'waiting') {
            $this->myorder->table = 'bookings_confirm';
            $data['booking_confirm'] = $this->mybooking->where('id_bookings', $data['booking']->id)->first();
        }

        $data['page']       = 'pages/mybooking/detail';

        $this->view($data);
    }
}

/* End of file Mybooking.php */
