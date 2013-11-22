<?php
class Model_Event_Twitter extends Model_ModelCore
{
    protected static $_properties = array(
		'id',
		'event_id',
		'hashtag',
		'timestamp',
		'media',
		'url',
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
	
	public static function read_feed($arg)
	{
		$limit = 50;
		$q = Model_Event_Twitter::query()
				->where('event_id','=',$arg['event_id'])
				->limit($limit);
		$max_page = ceil($q->count()/$limit);
		if($arg['page'] <= $max_page)
		{
			$q->offset($arg['page']*$limit);
			return $q->get();
		}
		return false;
	}
	
	public static function insert_twitter($arg)
	{
		$url_api	= 'https://api.twitter.com/1.1/search/tweets.json';
		$rsp_mthd	= 'GET';
		
		$hash_sign  = '%23';
		$event		= Model_Event_list::read_public_list($arg['event_id']);
		foreach($event['hashtags'] as $row)
		{
			$twitter_cfg= Config::get('ec.twitter');
			$tweets		= new stwitter\twitter($twitter_cfg);
			
			$max = Model_Event_Twitter::query()
					->where('event_id','=',$event['id'])
					->where('hashtag','=',$row['hashtag'])
					->order_by('timestamp','desc');
			$run = 1;
			$c	 = 0;
			$ts	 = $max->get_one();
			
			$max_ts = ($max->count() != 0)?$ts['timestamp']:0;
			
			$next_tag = 0;
			while($run)
			{
				if($c == 5)break;
				if(!empty($next_tag))
				{
					$format = '?q=%s&count=%b&max_id=%b';
					$tag	= $row['hashtag'];
					$qty	= 100;
					$mid	= $next_tag - 1;
					$query	= sprintf($format,$tag,$qty,$mid);
				}
				else
				{
					$format = '?q=%s&count=%b';
					$tag	= $hash_sign.$row['hashtag'];
					$qty	= 100;
					$query	= sprintf($format,$tag,$qty);
				}
				$rsp = $tweets->setGetfield($query)
							  ->buildOauth($url_api,$rsp_mthd)
							  ->performRequest();	
				$json= json_decode($rsp,true);
				
				try
				{
					Db::start_transaction();
					foreach($json['statuses'] as $tweet)
					{
						$dt = strtotime($tweet['created_at']);
						$ut = date('Ymhis',$dt);

						$dup = Model_Event_Twitter::query()
								->where('event_id','=',$arg['event_id'])
								->where('hashtag','=',$row['hashtag'])
								->where('timestamp','=',$ut);

						if($dup->count() == 0)
						{
							$q = new Model_Event_Twitter();
							$q->event_id = $arg['event_id'];
							$q->hashtag	 = $row['hashtag'];
							$q->timestamp= $ut;
							if(isset($tweet['entities']['media']))
							{
								$q->media	 = $tweet['entities']['media'][0]['media_url'];
							}
							
							if(isset($tweet['entities']['urls'][0]))
							{
								$q->url		 = $tweet['entities']['urls'][0]['expanded_url'];
							}
							
							$q->username = $tweet['user']['screen_name'];
							$q->user_img = str_replace('_normal','_bigger',$tweet['user']['profile_image_url']);
							$q->caption  = $tweet['text'];
							$q->save();
							$next_tag = $tweet['id'];
						}
					}
					Db::commit_transaction();
				}  
				catch (Exception $e)
				{
					print $e;
					break;
				}
				
				$c++;
			}
		}
	}
}

