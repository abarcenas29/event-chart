<?php
class Controller_chart2 extends Controller_AppCore
{
	public $template = 'chart2/template';
	
	public function action_index()
	{	
                $mCategory		= $this->_cm('category');
		$mCategory->cat		= Model_const::read_key('event_category');
		$mCategory->currentVal	= Cookie::get('category',null);
		
		$mRegion		= $this->_cm('region');
		$mRegion->city		= Model_city::read_area();
		$mRegion->currentVal	= Cookie::get('region',null);
		
		$mDate			= $this->_cm('date');
		$mDate->currentVal	= Cookie::get('date',null);
		
		$mPrice			= $this->_cm('price');
		
		$view = $this->_cg('chart');
		
		$this->template->category	= $mCategory;
		$this->template->region		= $mRegion;
		$this->template->date		= $mDate;
		$this->template->price		= $mPrice;
		
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
