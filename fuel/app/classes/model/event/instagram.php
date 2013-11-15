<?php
class Model_Event_Instagram extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'event_id',
		'timestamp',
		'img_thumb',
		'img_mid',
		'img_large',
		'username',
		'user_img',
		'caption',
		'created_at'
	);
	
	protected static $_belongs_to = array(
		'event_list' => array(
			'key_from'	=> 'event_id',
			'key_to'	=> 'id',
			'model_to'	=> 'Model_Event_List'
		)
	);
	
	public static function insert_photos($arg)
	{
		$max	= Model_Event_Instagram::query()
					->order_by('timestamp','desc');
		$while_stop = 1;
		$counter	= 0;
		
		if($max->count() != 0)
		{
			$max_timestamp = $max->get_one()['timestamp'];
		}
		else
		{
			$max_timestamp = 0;
		}
		
		$event	= Model_Event_list::read_public_list($arg['event_id']);
		$hashtag= $event['hashtag'];
		
		$next_tag = ''; 
		while($while_stop == 1)
		{
			if($counter == 4)
			{
				$while_stop = 0;
			}
			
			if(!empty($next_tag))
			{
				$url = "https://api.instagram.com/v1/tags/$hashtag/media/recent?client_id=bf41a820d25e43708b1755b15f818443&max_tag_id=$next_tag";
			}
			else
			{
				$url = "https://api.instagram.com/v1/tags/$hashtag/media/recent?client_id=bf41a820d25e43708b1755b15f818443";
			}
			
			$rsp		= \unirest\unirest::get($url);
			$next_tag	= $rsp->body->pagination->next_max_tag_id;
			
			$json_data  = $rsp->body->data;
			\Fuel\Core\DB::start_transaction();
			foreach($json_data as $row)
			{
				if((int) $row->created_time > $max_timestamp)
				{
					$q = new Model_Event_Instagram();
					$q->event_id	= $arg['event_id'];
					$q->timestamp	= $row->created_time;
					$q->img_thumb	= $row->images->thumbnail->url;
					$q->img_mid		= $row->images->low_resolution->url;
					$q->img_large	= $row->images->standard_resolution->url;
					$q->username	= $row->user->username;
					$q->user_img	= $row->user->profile_picture;
					$q->caption		= $row->caption->text;
					$q->save();
				}
			}
			\Fuel\Core\DB::commit_transaction();
			
			$counter++;
		}
		return $json_data;
	}
	
	public static function read_photos($arg)
	{
		$q = Model_Event_Instagram::query()
				->where('event_id','=',$arg['event_id'])
				->order_by('timestamp','desc')
				->rows_limit(50);
		
		$max_page = ceil($q->count()/50);
		if($arg['page'] <= $max_page)
		{
			$q->rows_offset($arg['page']);
			return $q->get();
		}
		return false;
	}
}

