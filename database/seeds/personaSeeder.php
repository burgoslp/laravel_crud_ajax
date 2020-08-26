<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class personaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i < 20; $i++) { 
            DB::table('personas')->insert(array(

                'nombre'=>$faker->FirstName,
                'apellido'=>$faker->lastname,
                'cedula'=>$faker->randomNumber($nbDigits = 7, $strict = false)

            ));
        }
    }
}
