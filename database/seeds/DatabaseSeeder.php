<?php

use App\Report;
use App\ReportField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Report::class, 100)->create();
        //factory(ReportField::class, 50)->create();

        ReportField::create([
            "field" => "marca",
            "title" => "Marca del Equipo",
            "description" => "Informa la marca del equipo",
            "isEnabled" => 1,
            "reportType_id" => 1,
        ]);
        ReportField::create([
            "field" => "condiciones",
            "title" => "Condiciones Tecnicas",
            "description" => "Describa las condiciones tecnicas del equipo",
            "isEnabled" => 1,
            "reportType_id" => 1,
        ]);
        ReportField::create([
            "field" => "folio",
            "title" => "Folio",
            "description" => "Ingresa el folio del reporte",
            "isEnabled" => 1,
            "reportType_id" => 1,
        ]);
        ReportField::create([
            "field" => "serie",
            "title" => "No. de Serie",
            "description" => "Ingresa el número de serie",
            "isEnabled" => 1,
            "reportType_id" => 1,
        ]);
        ReportField::create([
            "field" => "desc_equipo",
            "title" => "Descripción del Equipo",
            "description" => "Informa la marca del item",
            "isEnabled" => 1,
            "reportType_id" => 1,
        ]);

        ReportField::create([
            "field" => "marca",
            "title" => "Marca del Equipo",
            "description" => "Informa la marca del equipo",
            "isEnabled" => 1,
            "reportType_id" => 2,
        ]);
        ReportField::create([
            "field" => "condiciones",
            "title" => "Condiciones Tecnicas",
            "description" => "Describa las condiciones tecnicas del equipo",
            "isEnabled" => 1,
            "reportType_id" => 2,
        ]);
        ReportField::create([
            "field" => "folio",
            "title" => "Folio",
            "description" => "Ingresa el folio del reporte",
            "isEnabled" => 1,
            "reportType_id" => 2,
        ]);
        ReportField::create([
            "field" => "serie",
            "title" => "No. de Serie",
            "description" => "Ingresa el número de serie",
            "isEnabled" => 1,
            "reportType_id" => 2,
        ]);
        ReportField::create([
            "field" => "desc_equipo",
            "title" => "Descripción del Equipo",
            "description" => "Informa la marca del item",
            "isEnabled" => 1,
            "reportType_id" => 2,
        ]);

        ReportField::create([
            "field" => "marca",
            "title" => "Marca del Equipo",
            "description" => "Informa la marca del equipo",
            "isEnabled" => 1,
            "reportType_id" => 3,
        ]);
        ReportField::create([
            "field" => "condiciones",
            "title" => "Condiciones Tecnicas",
            "description" => "Describa las condiciones tecnicas del equipo",
            "isEnabled" => 1,
            "reportType_id" => 3,
        ]);
        ReportField::create([
            "field" => "folio",
            "title" => "Folio",
            "description" => "Ingresa el folio del reporte",
            "isEnabled" => 1,
            "reportType_id" => 3,
        ]);
        ReportField::create([
            "field" => "serie",
            "title" => "No. de Serie",
            "description" => "Ingresa el número de serie",
            "isEnabled" => 1,
            "reportType_id" => 3,
        ]);
        ReportField::create([
            "field" => "desc_equipo",
            "title" => "Descripción del Equipo",
            "description" => "Informa la marca del item",
            "isEnabled" => 1,
            "reportType_id" => 3,
        ]);

    }
}
