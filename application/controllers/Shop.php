<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{

    public function category($category, $page = null)
    {
        $data['title'] = 'Service';
        $data['content']    = $this->shop->select(
            [
                'service.id', 'service.title AS service_title', 'service.description', 'category.title AS category_title', 'category.slug AS category_slug'
            ]
        )
            ->join('category')
            ->where('category.slug', $category)
            ->paginate($page)
            ->get();

        $data['total_rows']     = $this->shop->where('category.slug', $category)->join('category')->count();
        $data['pagination']     = $this->shop->makePagination(
            base_url("shop/category/$category"),
            4,
            $data['total_rows']
        );
        $data['category']   = ucwords(str_replace('-', ' ', $category));
        $data['page']       = 'pages/home/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {

            redirect(base_url('/'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']      = 'Pencarian: Service';
        $data['content']    = $this->shop->select(
            [
                'service.id', 'service.title AS service_title', 'service.description', 'category.title AS category_title', 'category.slug AS category_slug'
            ]
        )
            ->join('category')
            ->like('service.title', $keyword)
            ->orLike('service.description', $keyword)
            ->paginate($page)
            ->get();

        $data['total_rows'] = $this->shop->like('service.title', $keyword)->orLike('service.description', $keyword)->count();
        $data['pagination'] = $this->shop->makePagination(base_url('shop/search'), 3, $data['total_rows']);
        $data['page']       = 'pages/home/index';

        $this->view($data);
    }
}

/* End of file Shop.php */
