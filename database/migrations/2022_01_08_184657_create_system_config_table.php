<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_config', function (Blueprint $table) {
            $table->id();
            $table->text('option');
           $table->text('value');
        });
        $data = [
            ['option'=>'site_name','value'=>'Bhagavad Gita Info'],
            ['option'=>'copyright_text','value'=>'Copyright © Bhagavad Gita Info services. All rights reserved.'],
            ['option'=>'address','value'=>'8010,Nr. Rajhans Multiplex Pal-Hazira, main road, Surat, Gujarat 502010'],
            ['option'=>'mobile','value'=>'+91 1234567890'],
            ['option'=>'GST','value'=>'AAAAA0000A'],
            ['option'=>'Sell_biill_start','value'=>'3000'],
            ['option'=>'bank_name','value'=>'RBI'],
            ['option'=>'bank_ac','value'=>'0202121546421'],
            ['option'=>'Bank_IFSC_Code','value'=>'Rbi2050j'],
            ['option'=>'Description1','value'=>'If you have any questions about this invoice, please contact'],
            ['option'=>'Description2','value'=>'If you have any questions about this invoice, please contact'],

        ];
        DB::table('system_config')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_config');
    }
}
