<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

// Juan José Escudero

interface ImageStorage 
{
    public function store(Request $request, $filepath);
}