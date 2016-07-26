<?php

namespace NicklasW\PkmGoApi\Providers;

use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

abstract class ServiceProvider {

    /**
     * @var ApplicationKernel
     */
    protected $app;

    /**
     * ServiceProvider constructor.
     *
     * @param ApplicationKernel $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Register the service provider.
     *
     * @return mixed
     */
    abstract public function register();

}