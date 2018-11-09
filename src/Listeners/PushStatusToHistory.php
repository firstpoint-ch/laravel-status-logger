<?php

namespace StatusHistory\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use StatusHistory\Events\StatusableModelSaved;

class PushStatusToHistory
{
    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(StatusableModelSaved $event)
    {
        if (isset($event->model->getDirty()['status_id'])) {
            $event->model->statuses()->attach($event->model->getDirty()['status_id']);
        }
    }
}
