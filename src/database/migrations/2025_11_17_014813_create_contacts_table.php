<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 255);
            $table->string('first_name', 255);
            $table->tinyInteger('gender'); // 1,2,3
            $table->string('email', 255);
            $table->string('tel', 255);    // 080-1234-5678 をまとめて入れる
            $table->string('address', 255);
            $table->string('building', 255)->nullable();
            $table->unsignedBigInteger('category_id'); // 1〜5
            $table->text('detail');
            $table->timestamps();   // Laravel標準のtimestamps()がtimestamp('created_at'),timestamp('updated_at')と同等のため採用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
