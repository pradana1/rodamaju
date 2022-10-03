<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mybooking_model extends MY_Model
{

    public $table = 'bookings';

    public function getDefaultValues()
    {
        return [
            'id_order'          => '',
            'account_name'      => '',
            'account_number'    => '',
            'nominal'           => '',
            'note'              => '',
            'image'             => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'account_name',
                'label' => 'Nama Pemilik',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'account_number',
                'label' => 'No. Rekening',
                'rules' => 'trim|required|max_length[50]'
            ],
            [
                'field' => 'nominal',
                'label' => 'Nominal',
                'rules' => 'trim|required|numeric'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Myorder_model.php */
