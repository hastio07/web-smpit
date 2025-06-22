<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProfilSekolah;
use App\Models\SosialMedia;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Menyediakan data profil sekolah ke semua view yang ada di frontend.*
        View::composer('*', function ($view) {
            $view->with('profilSekolah', ProfilSekolah::first());

            $sosmed = SosialMedia::all()->keyBy('platform');
            $view->with('dataSosmed', $sosmed);
        });
    }
}
