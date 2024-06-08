<?php

namespace App\Providers;
use App\Services\Impl\PengajuanPenundaanImpl;
use App\Services\PengajuanPenundaan;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PengajuanPenundaanProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        PengajuanPenundaan::class => PengajuanPenundaanImpl::class,
    ];

    public function provides(): array
    {
        return [PengajuanPenundaan::class];
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

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
