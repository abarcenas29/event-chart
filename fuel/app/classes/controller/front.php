<?php
class Controller_Front extends Controller_AppCore
{
	public $template = 'front/template';
	
	public function action_index()
	{
		$img		= File::read_dir(DOCROOT.'assets'.DS.'img'.DS.'front'.DS);
		$url_path	= Uri::create('assets/img/front/');

		$rand = rand(0,count($img) - 1);
		$img_path = $url_path . $img[$rand];
		
		$view = $this->_fg('home');
		$view->bgImage = $img_path;
		$view->area	   = Model_city::read_area();
		$this->template->content = $view;
	}
	
	public function action_ncr()
	{
		$region = array(
			'Caloocan City',
			'Las Piñas City',
			'Makati City',
			'Malabon City',
			'Mandaluyong City',
			'Manila',
			'Marikina City',
			'Muntinlupa City',
			'Navotas City',
			'Parañaque City',
			'Pasay City',
			'Pasig City',
			'Quezon City',
			'San Juan City',
			'Taguig City',
			'Valenzuela City'
		);
		
		$this->_set_cookie('ncr');
	}
	
	public function action_davao()
	{
		$this->_set_cookie('davao');
	}
	
	public function action_cebu()
	{
		$this->_set_cookie('cebu');
	}
	
	private function _set_cookie($region)
	{
		Cookie::set('region',$region,null,'/chart2');
		Response::redirect('chart2');
	}
	
	private function _fg($view)
	{
		$this->template->head = View::forge('header');
		return View::forge("front/$view");
	}
}