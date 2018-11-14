<?php

namespace StatusLogger\Traits;

trait HasStatus
{
    /**
     * Register saved event
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->dispatchesEvents['saved'] = \StatusLogger\Events\StatusableModelSaved::class;
    }

    /**
     * Get all of the models's statuses.
     */
    public function statuses()
    {
        return $this
            ->morphToMany(config('status.model'), 'statusable')
            ->orderBy('id', 'DESC')
            ->withPivot(config('status.pivot'));
    }

    /**
     * Return the current status models
     */
    public function status()
    {
        return $this->belongsTo(config('status.model'));
    }
}
