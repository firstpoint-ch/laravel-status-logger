<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusLoggerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function first_status_is_pushed_to_history_when_model_is_created()
    {
        $status = \StatusLogger\Models\Status::create(['name' => 'Test', 'slug' => 'test']);
        $cart = \App\Models\Cart::create(['status_id' => $status->id]);

        $this->assertEquals($cart->fresh()->statuses->first()->id, $status->id);
    }

    /** @test */
    public function status_is_pushed_to_history_when_model_is_updated()
    {
        $status = \StatusLogger\Models\Status::create(['name' => 'Test', 'slug' => 'test']);
        $status2 = \StatusLogger\Models\Status::create(['name' => 'Test 2', 'slug' => 'test2']);

        $cart = \App\Models\Cart::create(['status_id' => $status->id]);

        $cart->fresh()->update(['status_id' => $status2->id]);

        $this->assertEquals($cart->fresh()->statuses->first()->id, $status2->id);
    }

    /** @test */
    public function status_is_pushed_to_history_when_model_is_saved()
    {
        $status = \StatusLogger\Models\Status::create(['name' => 'Test', 'slug' => 'test']);
        $status2 = \StatusLogger\Models\Status::create(['name' => 'Test 2', 'slug' => 'test2']);

        $cart = \App\Models\Cart::create(['status_id' => $status->id]);

        $cart->status_id = $status2->id;
        $cart->save();

        $this->assertEquals($cart->fresh()->statuses->first()->id, $status2->id);
    }
}
