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
		Schema::create('cup_geo_comuni', function(Blueprint $table)
		{
            			$table->id();
			$table->string('nome_it');
			$table->boolean('capoluogo')->nullable();
			$table->string('codice_istat',6)->unique();
            $table->string('codice_catastale',6)->unique();
			$table->unsignedBigInteger('provincia_id')->index();
			$table->foreign('provincia_id')->references('id')->on('cup_geo_province')->onDelete('restrict')->onUpdate('cascade');
            $table->string('sigla_provincia',2);
            $table->unsignedBigInteger('regione_id')->index();
            $table->foreign('regione_id')->references('id')->on('cup_geo_regioni')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('area_id')->index();
            $table->foreign('area_id')->references('id')->on('cup_geo_aree')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('nazione_id')->index()->nullable()->default(null);
            $table->foreign('nazione_id')->references('id')->on('cup_geo_nazioni')->onDelete('restrict')->onUpdate('cascade');
			$table->string('cap',6)->nullable();
            $table->string('prefisso',6)->nullable();
            $table->decimal('lat',10,8)->nullable();
            $table->decimal('lng',11,8)->nullable();
            $table->boolean('attivo')->default(1);// varchar(50) DEFAULT NULL,

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cup_geo_comuni');
	}

};
