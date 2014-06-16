<?php
class Model_Event_Review extends Model_ModelCore
{
    protected static $_properties = array(
        'id',
        'fb_id',
        'event_id',
        'rating',
        'content',
        'status',
        'created_at'
    );
    
    protected static $_belongs_to = array(
        'event_list' => array(
            'key_from'  => 'event_id',
            'key_to'    => 'id',
            'model_to'  => 'Model_Event_List'
        )
    );
    
    protected static $_conditions = array(
        'order_by'  => array('id' => 'desc')  
    );
    
    public static function write_review($arg)
    {
        $event_id = Session::get('event_id');
        
        //find if there is a review existing
        $q = Model_Event_Review::query()
                ->where('fb_id','=',$arg['fbid'])
                ->where('event_id','=',$event_id);
        if($q->count() > 0)
        {
            $data         = $q->get_one();
            $data->status = 'History';
            $data->save();
        }
        
        $n = new Model_Event_Review();
        $n->fb_id       = $arg['fbid'];
        $n->event_id    = $event_id;
        $n->rating      = $arg['rating'];
        $n->content     = $arg['content'];
        $n->status      = 'Published';
        $n->save();
    }
    
    public static function review_feed()
    {
        $event_id = Session::get('event_id');
        
        $q = Model_Event_Review::query()
                ->where('event_id','=',$event_id)
                ->where('status','=','Published')
                ->get();
        return $q;
    }
}

