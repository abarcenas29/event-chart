<?php
class Controller_Ajax_Chart extends Controller_Ajax_AjaxCore
{
    public function post_init()
    {
        $view = $this->_cg2('chart');
        return $view;
    }
    
    /*
     * Old
     */
    public function post_load_chart_detail()
    {
        $event_id	= \Fuel\Core\Input::post('event_id');

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

