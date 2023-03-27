<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datafile_cup_geo_comuni_aggiuntive', function(Blueprint $table)
		{
			$table->id();
			$table->integer('row')->unsigned()->nullable();
			$table->unsignedBigInteger('datafile_id')->nullable();
            $table->string('datafile_sheet')->nullable();

            $table->string('codice_istat')->nullable();

            $table->string('cap')->nullable();
            $table->string('prefisso')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datafile_cup_geo_comuni_aggiuntive');
	}

};
