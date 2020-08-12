<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Repositories
     *
     * @var array
     */
    private $repositories = [
        \App\Contracts\Repositories\User\UserRepository::class
            => \App\Data\Repositories\User\EloquentUserRepository::class,
        \App\Contracts\Repositories\User\AddressRepository::class
            => \App\Data\Repositories\User\EloquentAddressRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $contract => $repository) {
            $this->app->singleton($contract, $repository);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
