<?php
class Model_Rss extends Model_ModelCore 
{
    public static function create_feed_array($city = 'all')
    {
        $q = Model_chart::format_chart($city);
        
        $xml = new SimpleXMLElement('<rss></rss>');
        $xml->addAttribute('xmlns:xmlns:content','http://purl.org/rss/1.0/modules/content/');
        $xml->addAttribute('xmlns:xmlns:dc','http://purl.org/dc/elements/1.1/');
        $xml->addAttribute('xmlns:xmlns:sy','http://purl.org/rss/1.0/modules/syndication/');
        $xml->addAttribute('xmlns:xmlns:atom','http://www.w3.org/2005/Atom');
        $xml->addAttribute('xmlns:xmlns:media','http://search.yahoo.com/mrss/');
        $xml->addAttribute('version','2.0');
        
        $channel = $xml->addChild('channel');
        $atom    = $channel->addChild('atom:atom:link');
        $atom->addAttribute('href',Uri::create('feeds/rss'));
        $atom->addAttribute('rel','self');
        $atom->addAttribute('type','application/rss+xml');
        
        $channel->addChild('title','Event Chart');
        $channel->addChild('link',Uri::base());
        $channel->addChild('description','The events you love - all listed in one place.');
        $channel->addChild('language','en-US');
        $channel->addChild('sy:sy:updatePeriod','daily');
        $channel->addChild('sy:sy:updateFrequency','1');
        
        foreach($q as $row){
            $item = $channel->addChild('item');
            $item->addChild('title',$row['title']);
            $item->addChild('link',$row['link']);
            $item->addChild('description',$row['start_at'] .' - '. $row['end_at']);
            
            $thumb = $item->addChild('media:media:thumbnail');
            $thumb->addAttribute('url',$row['thumb']);
            $thumb->addAttribute('height','75');
            $thumb->addAttribute('width','75');
        }
        
        return $xml->asXML();
    }
}

