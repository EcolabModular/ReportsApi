<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('field');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('isEnabled');
            $table->integer('reportType_id'); //Dictionary foreign Key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_fields');
    }
}
