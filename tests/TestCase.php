<?php

namespace StatusLogger\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use StatusLogger\StatusLoggerServiceProvider;
use Illuminate\Database\Schema\Blueprint;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {
        return [
            StatusLoggerServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
        });

        $this->artisan('migrate', ['--database' => 'sqlite']);
    }
}
