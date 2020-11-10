<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Juan José Escudero

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('Faker', function($app) {
            $faker = \Faker\Factory::create();
            $newClass = new class($faker) extends \Faker\Provider\Base {

                public function car()
                {
                    $brandsAndModels = [
                        "Audi" => ['A2', 'A4', 'S3', 'S4', 'S8', 'A5', 'R8', 'S5', 'Q5'],
                        "Bentley" => ['Arnage', 'Azure', 'Brooklands', 'Continental', 'Corniche', 'Eight', 'Mulsanne'],
                        "BMW" => ['8 Series', 'M1', 'X5', 'Z1', 'Z8', 'Alpina', 'M', 'X6', '1 Series'],
                        "Bugatti" => ['EB 110', 'EB 112', 'Veyron', 'Galibier', 'Chiron'],
                        "Cadillac" => ['Escalade', 'Evoq', 'LSE', 'SRX', 'Vizon', 'XLR', 'STS', 'DTS', 'Fleetwood', 'CTS-V Coupe'],
                        "Chevrolet" => ['Blazer', 'Camaro', 'Corvette', 'Alero', 'Astra', 'Aveo', 'Beretta', 'Caprice', 'Cavalier'],
                        "Ferrari" => ['Mondial', 'Testarossa', '612 Scaglietti', 'Barchetta', '400', '412', '456', '456M', '512'],
                        "Ford" => ['Capri', 'Escort', 'Explorer', 'Fiesta', 'Focus', 'Fusion', 'Galaxy', 'Granada', 'KA'],
                        "Mazda" => ['3', '5', 'CX-7', 'CX-9', 'Millenia', 'Sentia', '3 MPS', 'Persona', 'Protege', 'BT-50', 'Capella'],
                        "McLaren" => ['MP4', 'F1', '650S', 'P1', '675LT', '570 GT'],
                        "Porsche" => ['Boxster', 'Cayenne', '959', 'Cayman', 'Panamera', '964', 'Macan', '996', '918 Spyder'],
                        "Renault" => ['4', '5', '6', '9', 'A610', 'Avantime', 'Clio', 'Espace', 'Fuego', 'Grand Espace'],
                        "Tesla" => ['Model S', 'Model X', 'Model 3', 'Roadster', 'Model Y', 'Cybertruck'],
                        "Toyota" => ['4Runner', 'Avensis', 'Avensis Verso', 'Camry', 'Carina', 'Carina E', 'Celica', 'Corolla'],
                        "Volkswagen" => ['Beetle', 'Bora', 'Corrado', 'Derby', 'Golf I', 'Jetta', 'Santana', 'Scirocco']
                    ];

                    $brand = array_keys($brandsAndModels)[rand(0,count($brandsAndModels)-1)];
                    $modelsArray = $brandsAndModels[$brand];
                    $model = $modelsArray[rand(0, count($modelsArray)-1)];

                    $car = [$brand, $model];    

                    return $car;
                }
            };
    
            $faker->addProvider($newClass);
            return $faker;
        });
    }

}
