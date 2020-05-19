<?php

use App\Report;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Report::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(1,true),
        'description' => $faker->paragraph(1),
        'status' => $faker->randomElement([Report::REPORTE_URGENTE, Report::REPORTE_REGULAR, Report::REPORTE_ARCHIVADO, Report::REPORTE_ATENDIDO, Report::REPORTE_CANCELADO]),
        'reportType_id' =>  $faker->numberBetween(1,3), // PREVENTIVO, CORRECTIVO, PREDICTIVO
    ];
});


$factory->define(App\ReportField::class, function (Faker\Generator $faker) {
    return [
        'field' => $faker->word,
        'title' => $faker->word . " " . $faker->word,
        'description' => $faker->paragraph(1),
        'isEnabled' => $faker->numberBetween(0,1),
        'reportType_id' =>  $faker->numberBetween(1,3), // PREVENTIVO, CORRECTIVO, PREDICTIVO
    ];
});
