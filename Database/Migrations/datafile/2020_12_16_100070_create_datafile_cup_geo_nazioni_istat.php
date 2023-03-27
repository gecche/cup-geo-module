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
		Schema::create('datafile_cup_geo_nazioni_istat', function(Blueprint $table)
		{
			$table->id();
			$table->integer('row')->unsigned()->nullable();
			$table->unsignedBigInteger('datafile_id')->nullable();
            $table->string('datafile_sheet')->nullable();

            $table->string('stato_territorio')->nullable();
            $table->string('codice_continente')->nullable();
            $table->string('nome_continente_it')->nullable();
            $table->string('codice_area')->nullable();
            $table->string('nome_area_it')->nullable();
            $table->string('codice_istat')->nullable();
            $table->string('nome_it')->nullable();
            $table->string('nome_en')->nullable();
            $table->string('codice_MIN')->nullable();
            $table->string('codice_catastale')->nullable();
            $table->string('codice_UNSD_M49')->nullable();
            $table->string('codice_iso_2')->nullable();
            $table->string('codice_iso_3')->nullable();
            $table->string('codice_istat_padre')->nullable();
            $table->string('codice_iso_3_padre')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datafile_cup_geo_nazioni_istat');
	}

};
