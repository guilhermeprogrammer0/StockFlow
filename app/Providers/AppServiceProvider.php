<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin',function(User $user){
            return $user->role == 'administrador';
        });
        Gate::define('acao_admin',function(User $user, User $usuario){
            return $user->id === $usuario->id ||$usuario->role == 'comum';
        });
        Gate::define('comum',function(User $user){
            return $user->role == 'comum';
        });
        Gate::define('senha',function(User $user, User $usuario){
            return $user->id === $usuario->id;
        });
        
        // Gate::define('ver_teste', [PolicyPagina::class, 'ver_teste']);
    }
}
