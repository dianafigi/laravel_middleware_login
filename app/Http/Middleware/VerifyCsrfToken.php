<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/login'  //colocar aqui para termos acesso ao request e poder realizar 'post' pois como este 'formulario' nao ta no 'html', nao da para incluir o {{ csrf_field() }}
    ];
}
