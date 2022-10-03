<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends MY_Controller
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
        $data['title']      = 'Admin: Booking';
        $data['content']    = $this->booking->orderBy('date', 'DESC')->paginate($page)->get();
        $data['total_rows'] = $this->booking->count();
        $data['pagination'] = $this->booking->makePagination(base_url('booking'), 2, $data['total_rows']);
        $data['page']       = 'pages/booking/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {

            redirect(base_url('booking'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']      = 'Admin: booking';
        $data['content']    = $this->booking->like('invoice', $keyword)->orderBy('date', 'DESC')->paginate($page)->get();
        $data['total_rows'] = $this->booking->like('invoice', $keyword)->count();
        $data['pagination'] = $this->booking->makePagination(base_url('booking/search'), 3, $data['total_rows']);
        $data['page']       = 'pages/booking/index';

        $this->view($data);
    }

    public function reset()
    {

        $this->session->unset_userdata('keyword');

        redirect(base_url('booking'));
    }

    public function detail($id)
    {
        $data['booking']      = $this->booking->where('id', $id)->first();
        if (!$data['booking']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('/orde'));
        }

        $this->booking->table       = 'bookings_detail';
        $data['booking_detail']       = $this->booking->select([
            'bookings_detail.id_bookings', 'bookings_detail.id_service', 'bookings_detail.datebook', 'service.title'
        ])
            ->join('service')
            ->where('bookings_detail.id_bookings', $id)
            ->get();


        if ($data['booking']->status !== 'waiting') {
            $this->booking->table = 'bookings_confirm';
            $data['booking_confirm'] = $this->booking->where('id_bookings', $id)->first();
        }

        $data['page']       = 'pages/booking/detail';

        $this->view($data);
    }

    public function update($id)
    {
        if (!$_POST) {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
            redirect(base_url("booking/detail/$id"));
        }

        if ($this->booking->where('id', $id)->update(['status' => $this->input->post('status')])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui.');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url("booking/detail/$id"));
    }
}

/* End of file Booking.php */
