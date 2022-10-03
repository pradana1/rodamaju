<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function index($page = null)
	{
		$data['title'] = 'Homepage';
		$data['content']    = $this->home->select(
			[
				'service.id', 'service.title AS service_title', 'service.description', 'category.title AS category_title', 'category.slug AS category_slug'
			]
		)
			->join('category')
			->paginate($page)
			->get();

		$data['total_rows'] = $this->home->count();
		$data['pagination']   = $this->home->makePagination(
			base_url('home'),
			2,
			$data['total_rows']
		);
		$data['page'] = 'pages/home/index';
		$this->view($data);
	}
}

/* End of file Home.php */
