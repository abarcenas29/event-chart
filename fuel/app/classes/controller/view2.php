<?php
class Controller_View2 extends Controller_AppCore
{
    public $template = 'view2/template';
	
    public function action_event()
    {
        $this->template->content = $this->_vg('event');
    }
    
    public function action_org()
    {
        $this->template->content = $this->_vg('organization');
    }

    private function _vg($view)
    {
        $this->template->head = View::forge('header');
        return View::forge("view2/$view");
    }
}

