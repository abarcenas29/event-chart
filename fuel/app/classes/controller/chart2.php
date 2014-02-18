<?php
class Controller_chart2 extends Controller_AppCore
{
	public $template = 'chart2/template';
	
	public function action_index()
	{
		$currentCategory = array();
		if(!is_null(Cookie::get('category',null)))
		{
			$currentCategory = json_decode(Cookie::get('category'),true);
		}
		
		$currentRegion = array();
		if(!is_null(Cookie::get('region',null)))
		{
			$currentRegion = json_decode(Cookie::get('region'),true);
		}
		
		$mCategory				= $this->_cm('category');
		$mCategory->cat			= Model_const::read_key('event_category');
		$mCategory->currentVal	= $currentCategory;
		
		$mRegion				= $this->_cm('region');
		$mRegion->city			= Model_city::read_area();
		$mRegion->currentVal	= $currentRegion;
		
		$view = $this->_cg('chart');
		
		$this->template->category	= $mCategory;
		$this->template->region		= $mRegion;
		$this->template->content	= $view;
	}
	
	private function _cm($view)
	{
		$view = View::forge("chart2/filter/$view");
		return $view;
	}
	
	private function _cg($view)
	{
		$this->template->head = View::forge('header');
		return View::forge("chart2/$view");
	}
}
