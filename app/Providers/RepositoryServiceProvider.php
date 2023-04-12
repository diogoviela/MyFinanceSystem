<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MovementRepositoryInterface;
use App\Repositories\MovementRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MovementRepositoryInterface::class, MovementRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
