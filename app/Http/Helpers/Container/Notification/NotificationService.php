<?php
namespace App\Http\Helpers\Container\Notification;

class NotificationService {

    protected $messages;
    protected $service;

    public function __construct() {
        $this->messages = collect();
        $this->service = 'toaster';
    }

    /**
     * Push Message message to toaster
     * @param type $message 
     * @param type $level = success ,error and info
     * @return type
     */
    public function push($message, $title = '', $level, $service = null) {
        if (empty($service) == false) {
            $this->service = $service;
        }
        if (empty($title) == true) {
            $title = ucfirst($level);
        }
        $this->messages->push(
                ['level' => $level,
                    'message' => $message,
                    'title' => $title,
                    'service' => $this->service
        ]);

        return $this->flash();
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear() {
        $this->messages = collect();

        return $this;
    }

    /**
     * Flash all messages to the session.
     */
    protected function flash() {
        \Session::flash('atr_notification', $this->messages);
        return $this;
    }

}
