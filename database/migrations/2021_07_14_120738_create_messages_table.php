<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('from')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('to')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['from']);
            $table->dropForeign(['to']);
        });
        Schema::dropIfExists('messages');
    }
}
