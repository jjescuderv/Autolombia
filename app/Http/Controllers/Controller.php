<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //Comentario de prueba #1, pull request desde branch jhonatan
    //Comentario de prueba #2, pull request desde branch juanjose
    //Prueba desde local
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
