<?php
require_once 'vendor/autoload.php';


$faker = Faker\Factory::create();

use ILLuminate\Database\capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
   'driver' => 'mysql',
    'host' => 'localhost',
    'database'=> 'uni',
    'username' => 'root',


]);

$capsule->bootEloquent();

for ( $i = 0 ; $i<100 ; $i++){
    Capsule:table('students')->insert([
       'name' => $faker->name,
       'username'=>$faker->userName,
        'email'=> $faker->email,
        'address'=>$faker->address,
        'tel'=>$faker->phoneNumber



    ]);
}

Capsule::table('student')->delete(14);
Capsule::table('student')->where('id',18)->update(['username'=>newuser]);

$student = Capsule::table('students')->where('id','>',8)->get();
echo '<pre>';
print_r($student);

