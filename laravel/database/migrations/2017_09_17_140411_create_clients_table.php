<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('document')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->boolean('defaulting');
            $table->date('data_nascimento')->nullable();
            $table->char('sexo')->nullable();
            $table->enum('civil_state', array_keys(\App\Client::CIVIL_STATE))->nullable();
            $table->string('disabled')->nullable();
            $table->string('fantasy_name')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
