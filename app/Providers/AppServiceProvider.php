<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User ; 


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();

        //gate atau gerbang yang bernama admin hanya bisa diakses jika user yang sedang login usernamenya bernama bayuaji 
        //fungsi dibuatnya get adalah agar user lain tidak melakukan hal2 lain selain bayuaji 
        //get ini akan dipakai di sidebar.blade.php agar category for admin hilang atau tidak bisa diakses kecuali oleh yang berhubungan dengan code dibawah 
        Gate::define('admin', function (User $user) {
            return $user->is_admin ; 
        }) ;
    }
}
