<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_table', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->unique();
            $table->foreignId('torre_details_id')->constrained()
            ->onDelete('cascade');
            $table->timestamps();


        });
    }

    // $table->foreign('torre_details_id')->references('id')->on('torre_details')->onDelete('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_table');
    }
}
