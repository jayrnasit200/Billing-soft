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
            $table->string('shop_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('description');
            $table->text('address');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert( [
               'shop_name'=>'Admin',
               'email'=>'admin@shreehari.net',
               'password'=> bcrypt('123456'),
               'description'=>'description',
               'address'=>'address',
            ]);
       

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
