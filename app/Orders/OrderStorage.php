<?php

namespace App\Orders;

interface OrderStorage
{
    public function store($id);
}
