<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChattrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chattrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id');
            $table->foreignId('created_by');
            $table->longText('chattr');
            $table->integer('likes')->default(0);
            $table->integer('dislike')->default(0);
            $table->timestamps();

            $table->foreign('job_id')
            ->references('id')
            ->on('jobs')
            ->onDelete('cascade');

            $table->foreign('created_by')
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
        Schema::dropIfExists('chattrs');
    }
}
