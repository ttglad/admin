<?php

namespace App\Listeners;

use App\Events\SystemLogEvent;
use App\Models\SystemLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Route;
use Request;

class SystemLogListener
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SystemLogEvent  $event
     * @return void
     */
    public function handle(SystemLogEvent $event)
    {
        $log = new SystemLog();
        $log->user_id = auth()->user()->id;
        $log->type = $event->type;
        $log->content = $event->content;
        $log->url = Route::currentRouteAction();
        $log->operator_ip = Request::ip();
        $log->created_at = date('Y-m-d H:i:s');

        $log->save();
    }
}
