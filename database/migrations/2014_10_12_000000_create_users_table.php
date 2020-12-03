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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->integer('genre');
            $table->foreignId('cat_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('api_token');
            $table->string('lat')->nullable();
            $table->string('license_no')->nullable();
            $table->string('long')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->default('assets/img/user/default.png');
            $table->string('firebase_token')->default('firebaseToken_here');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
