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
        factory(ReportField::class, 50)->create();
    }
}
