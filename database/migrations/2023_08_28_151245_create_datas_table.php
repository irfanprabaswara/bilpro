<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('Partner');
            $table->string('Idnumber');
            $table->string('BPName');
            $table->string('Account Name');
            $table->string('Subsegmen');
            $table->string('Business Share');
            $table->string('Divisi');
            $table->string('Witel');
            $table->string('Cicilan');
            $table->string('Bill Curr');
            $table->string('Saldo Akhir N-1');
            $table->string('Tagihan N');
            $table->string('Total Tagihan');
            $table->string('Total CL');
            $table->string('Saldo Akhir');
            $table->string('0-3 Bulan');
            $table->string('4-6 Bulan');
            $table->string('7-12 Bulan');
            $table->string('13-24 Bulan');
            $table->string('> 24 Bulan');
            $table->string('L11 Saldo');
            $table->string('STATUS 1');
            $table->string('UPDATE TUNGGAKAN');
            $table->string('TGL UPDATE');
            $table->string('STATUS 2');
            $table->string('SEGMEN 2');
            $table->string('AM UPDATE');
            $table->string('NAMA PELANGGAN');
            $table->string('STO');
            $table->string('HERO');
            $table->string('DATEL');
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
        Schema::dropIfExists('datas');
    }
}
