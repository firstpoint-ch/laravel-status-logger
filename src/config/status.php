<?php

return [

    /**
     * Here you can override the default status model
     *
     * For may need to retrieve statuses from model like so:
     *
     * public function orders()
     * {
     *     return $this->morphedByMany('App\Order', 'statusable');
     * }
     */
    'model' => \StatusLogger\Models\Status::class,

    /**
     * If you need to add pivot columns from the statusables table
     */
    'pivot' => [],

];
