<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateJobsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_jobs_tables', function (Blueprint $table) {
            $table->id();
            $table->text('job_title')->unique();
            $table->foreignId('created_by');
            $table->timestamps();

            $table
            ->foreign('created_by')
            ->references('torre_username')
            ->on('torre_details')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_jobs_tables');
    }
}
