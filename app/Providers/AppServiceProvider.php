<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('unique_title_with_parent_id', function ($attribute, $value, $parameters, $validator) {
            $idPadre = $validator->getData()['id_padre'];
            return !DB::table('document_padre')->where('titulo', $value)->where('id_padre', $idPadre)->exists();
        });

        Validator::extend('unique_title_with_teacher_id', function ($attribute, $value, $parameters, $validator) {
            $idDocente = $validator->getData()['id_docente']; // Asegúrate de usar 'id_docente'
            return !DB::table('document_docente')->where('titulo', $value)->where('id_docente', $idDocente)->exists();
        });
    }
}
