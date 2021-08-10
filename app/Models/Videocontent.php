<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videocontent extends Model
{
    const VIDEO_STORAGE_PATH    = '/uploads/videos/';
    
    protected $fillable = [
        'video' ,'title', 'content','website'
    ];
    
        
    /**
     * To get youtube URL.
     *
     * @param type $url
     * @return string
     */
    public static function getYoutubeUrl($url)
    { 
        $link = '#';
        if (! empty($url)) {
            if (strpos($url, "www.youtube.com/watch?v=") != false) {
                $videoUrl = str_replace("www.youtube.com/watch?v=","www.youtube.com/embed/", $url);
                $videoUrlBlocks = explode('&', $videoUrl);
                $link = isset($videoUrlBlocks[0])? $videoUrlBlocks[0] : $link;
            }
            else if (strpos($url,"youtu.be/") != false) {
                $videoUrl = str_replace("youtu.be/", "www.youtube.com/embed/", $url);
                $link = $videoUrl;
            }
            else if (strpos($url, "www.youtube.com/embed/") != false) {
                $link = $url;
            }
            else{
                $link = '#';
            }
        }
        return $link;
    }
}
