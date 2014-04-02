<?php
class Model_Event_Instagram extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'event_id',
		'hashtag',
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
		$event	= Model_Event_list::read_public_list($arg['event_id']);
		foreach($event['hashtags'] as $row)
		{
			$timestamp = Model_ModelCore::_get_timestamp($arg['event_id']);
			
			$hashtag= $row['hashtag'];
			$max	= Model_Event_Instagram::query()
						->where('event_id','=',$event['id'])
						->where('hashtag','=',$hashtag)
						->order_by('timestamp','desc');
			
			$while_stop = 1;
			$counter	= 0;

			if($max->count() != 0)
			{
				$ts = $max->get_one();
				$max_timestamp = $ts['timestamp'];
			}
			else
			{
				$max_timestamp = 0;
			}
			
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

				if(!isset($rsp->body->pagination->next_max_tag_id))
				{
					break;
				}

				$next_tag	= $rsp->body->pagination->next_max_tag_id;

				$json_data  = $rsp->body->data;
				\Fuel\Core\DB::start_transaction();
				foreach($json_data as $row)
				{
					if((int) $row->created_time > $max_timestamp && 
							 $row->created_time >= $timestamp)
					{
						$q = new Model_Event_Instagram();
						$q->event_id	= $arg['event_id'];
						$q->hashtag		= $hashtag;
						$q->timestamp	= $row->created_time;
						$q->img_thumb	= $row->images->thumbnail->url;
						$q->img_mid		= $row->images->low_resolution->url;
						$q->img_large	= $row->images->standard_resolution->url;
						$q->username	= $row->user->username;
						$q->user_img	= $row->user->profile_picture;
						$q->caption		= (isset($row->caption->text))?$row->caption->text:'';
						$q->save();
					}
				}
				\Fuel\Core\DB::commit_transaction();

				$counter++;
			}
		}
	}
	
	public static function read_photos($arg)
	{
		$limit = 50;
		$timestamp = Model_ModelCore::_get_timestamp($arg['event_id']);
		
		$q = Model_Event_Instagram::query()
				->where('event_id','=',$arg['event_id'])
				->where('timestamp','>=',$timestamp)
				->order_by('timestamp','desc')
				->limit($limit);
		
		$max_page = ceil($q->count()/$limit);
		if($arg['page'] <= $max_page)
		{
			$q->offset($arg['page']*$limit);
			return $q->get();
		}
		return false;
	}
	
	public static function delete_instagram_by_hashtag($q)
	{
		$q = Model_Event_Instagram::query()
				->where('event_id','=',$q['event_id'])
				->where('hashtag','=',$q['hashtag'])
				->delete();
	}
	
	public static function remove_instagram_by_event($event_id)
	{
		$q = Model_Event_Instagram::query()
				->where('event_id','=',$event_id);
		$q->delete();
	}
}

