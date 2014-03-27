<?php
class Controller_Ajax_Chart extends Controller_Ajax_AjaxCore
{
    private $_half_year = '+6 months';
    
    public function post_init()
    {
        $half_year = strtotime($this->_half_year);
        
        $arg = array();
        $arg['region'] = Input::post('region');
        
        Cookie::set('region',$arg['region'],null,'/chart2');
        
        $menuType = Input::post('type');
        if($menuType == "normal")
        {
            $arg['start_at'] = date('Y-m-d');
            $arg['end_at']   = date('Y-m-d',$half_year);
            $q = Model_chart::format_chart($arg);
        }
        elseif($menuType == "archive")
        {
            $q = Model_chart::event_archive($arg);
        }
        else
        {
            
        }
        
        $view    = $this->_cg2('chart');
        $view->q = $q;
        
        return $view;
    }
    
    /*
     * Old
     */
    public function post_load_chart_detail()
    {
        $event_id	= Input::post('event_id');

        $view		= $this->_cg('chart');
        $view->q	= Model_Event_list::read_public_list($event_id);
        return $view;
    }

    private function _cg2($view)
    {
        return View::forge("chart2/ajax/$view");
    }
    
    private function _cg($view)
    {
            return View::forge("chart/ajax/$view");
    }
}

