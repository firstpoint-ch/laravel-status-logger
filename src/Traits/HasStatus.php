<?php

namespace StatusHistory\Traits;

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

        $this->dispatchesEvents['saved'] = \StatusHistory\Events\StatusableModelSaved::class;
    }

    /**
     * Get all of the models's statuses.
     */
    public function statuses()
    {
        return $this
            ->morphToMany(\StatusHistory\Models\Status::class, 'statusable')
            ->orderBy('id', 'DESC');
    }

    /**
     * Return the current status models
     */
    public function status()
    {
        return $this->belongsTo(\StatusHistory\Models\Status::class);
    }
}
