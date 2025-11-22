<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();  //同じメールアドレスでの登録防止のため
            //  ↓デフォルトで存在、今回「メール認証」機能はないためコメントアウト
            //  $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();  //デフォルトでありログイン状態を保持するために残します
            $table->timestamps();  // Laravel標準のtimestamps()がtimestamp('created_at'),timestamp('updated_at')と同等のため採用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
