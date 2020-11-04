<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Orders\OrderStorage;
use App\Util\OrderPdf;
use App\Util\OrderHtml;

class OrderProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderStorage::class, function ($id, $parameters) {
            $type = $parameters['array'];
            if ($type == "PDF") {
                return new OrderPdf();
            } else {
                return new OrderHtml();
            }
        });
    }
}
