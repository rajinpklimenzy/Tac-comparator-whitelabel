<?php
/* 
 * Notification Helper
 * Used for toasting notificatin message 
 * @author Jithin S
 * @date 11-Aug-2018
 * @revised 14-Aug-2018
 */
namespace App\Http\Helpers\Utility;

use App\Model\Notifications;
use Carbon\Carbon;

class ToastrHelper
{
    
    /**
     * Toast info message
     * @param string $message
     * @param string $title
     * @return notification service
     */
    public static function info($message, $title = '')
    {
        return app('atrNotification')->push($message,$title,  __FUNCTION__);
    }

     /**
     * Toast error message
     * @param string $message
     * @param string $title
     * @return notification service
     */
    public static function error($message, $title = '')
    {
        return app('atrNotification')->push($message, $title, __FUNCTION__);
    }

     /**
     * Toast error message
     * @param string $message
     * @param string $title
     * @return notification service
     */
    public static function success($message,$title = '')
    {
        return app('atrNotification')->push($message, $title, __FUNCTION__);
    }

    /**
     * Toast  message accroding to level type
     * @param string $message
     * @param string $title
     * @param string $level {success,error,info}
     * @return notification service
     */
    public static function show($message, $title = '',$level = 'success')
    {
        $level  = strtolower($level);
        if ($level == 'success') {
            self::success($message,$title);
        }
        if ($level == 'error' || $level == 'failed' || $level == 'danger') {
            self::error($message,$title);
        }
        if ($level == 'info' ) {
            self::info($message,$title);
        }
    }

    public static function notificattionAlert()
    {
        $data = Notifications::where('priority', 1)
                ->where('start_at', '<=', Carbon::now())
                ->where('end_at', '>=', Carbon::now())
                ->get();

        $html = '';
        foreach ($data as $notification) {
            switch ($notification->type)
            {
                case 1:
                    $html .= '<div class="m-alert m-alert--icon alert alert-warning" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-danger"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        '.$notification->message.'
                                    </div>	
                                    <div class="m-alert__actions" style="width: 220px;">
                                        <a href="'.$notification->button_url.'" target="_blank" class="btn btn-outline-light btn-sm m-btn m-btn--hover-danger" data-dismiss="alert1" aria-label="Close">'.$notification->button_title.'
                                        </a>	
                                    </div>			  	
                                </div>';
                    break;
                case 2:
                    $html .= '<div class="m-alert m-alert--icon alert alert-success" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-alert"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        '.$notification->message.'
                                    </div>	
                                    <div class="m-alert__actions" style="width: 220px;">
                                        <a href="'.$notification->button_url.'" target="_blank" class="btn btn-outline-light btn-sm m-btn m-btn--hover-success" data-dismiss="alert1" aria-label="Close">'.$notification->button_title.'
                                        </a>	
                                    </div>			  	
                                </div>';
                    break;
                case 3:
                    $html .= '<div class="m-alert m-alert--icon alert alert-danger" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-danger"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        '.$notification->message.'
                                    </div>	
                                    <div class="m-alert__actions" style="width: 220px;">
                                        <a href="'.$notification->button_url.'" target="_blank" class="btn btn-outline-light btn-sm m-btn m-btn--hover-danger" data-dismiss="alert1" aria-label="Close">'.$notification->button_title.'
                                        </a>	
                                    </div>			  	
                                </div>';
                    break;
            }
        }

        return $html;
    }

}




