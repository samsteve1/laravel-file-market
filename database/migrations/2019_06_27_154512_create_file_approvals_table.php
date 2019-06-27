<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('file_id')->unsigned()->index();
            $table->string('title', 255);
            $table->string('overview_short', 300);
            $table->text('overview', 5000);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_approvals');
    }
}
