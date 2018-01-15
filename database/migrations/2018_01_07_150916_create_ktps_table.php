<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktps', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nik", 16);
            $table->string("nama", 100);
            $table->string("jenis_kelamin", 1);
            $table->string("tempat_lahir", 50);
            $table->date("tgl_lahir");
            $table->text("alamat");
            $table->string("rt_rw", 10);
            $table->string("kelurahan", 50);
            $table->string("kecamatan", 50);
            $table->string("agama", 50);
            $table->enum("status", ['kawin', 'belum kawin']);
            $table->string("pekerjaan", 50);
            $table->string("kewarganegaraan", 50);
            $table->date("berlaku");
            // $table->boolean("kepala_keluarga")->default(false);
            // $table->integer("kk_id")->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('kk_id')->references('id')->on('kks')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktps');
    }
}
