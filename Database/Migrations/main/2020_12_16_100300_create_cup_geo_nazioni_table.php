<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cup_geo_nazioni', function(Blueprint $table)
		{
		    $table->id();// int(11) NOT NULL,
            $table->string('codice_istat',3)->unique();// varchar(4) DEFAULT NULL,
            $table->string('codice_catastale',4)->unique()->nullable()->default(null);// varchar(4) DEFAULT NULL,
            $table->string('codice_iso_2',2)->nullable()->default(null);// varchar(50) DEFAULT NULL,
            $table->string('codice_iso_3',3)->nullable()->default(null);// varchar(50) DEFAULT NULL,
            $table->string('nome_it',255);// varchar(50) DEFAULT NULL,
            $table->string('nome_en',255)->nullable();// varchar(50) DEFAULT NULL,
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);// varchar(50) DEFAULT NULL,
            $table->foreign('parent_id')->references('id')->on('cup_geo_nazioni')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('continente_id')->nullable()->default(null);// varchar(50) DEFAULT NULL,
            $table->foreign('continente_id')->references('id')->on('cup_geo_continenti')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('area_id')->nullable()->default(null);// varchar(50) DEFAULT NULL,
            $table->foreign('area_id')->references('id')->on('cup_geo_aree_mondiali')->onDelete('restrict')->onUpdate('cascade');
//            $table->boolean('flag')->default(0);// varchar(50) DEFAULT NULL,
            $table->boolean('attivo')->default(1);// varchar(50) DEFAULT NULL,


            $table->nullableOwnerships();
            $table->nullableTimestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cup_geo_nazioni');
	}

};
