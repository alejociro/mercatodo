<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up() : void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 120);
            $table->timestamp('disabled_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('users');
    }
}
