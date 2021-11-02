<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('valu');
            $table->timestamps();
        });
        $user = [
            [
               'name'=>'0%',
               'valu'=>'0',
            ],
            [
               'name'=>'8%',
               'valu'=>'8',
            ],
            [
               'name'=>'12%',
               'valu'=>'12',
            ],
            [
                'name'=>'18%',
                'valu'=>'18',
             ],
        ];
  
        foreach ($user as $key => $value) {
            
        DB::table('gst')->insert($value);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gst');
    }
}
