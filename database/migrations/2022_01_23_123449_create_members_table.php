<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',50)->nullable(false);
            $table->string('lastname',50)->nullable(false);
            $table->enum('gender',['MALE','FEMALE','OTHER'])->default('OTHER');
            $table->string('email_address',40)->nullable('false');
            $table->string('msisdn',15)->nullable();
            $table->integer('country_id')->nullable()->unsigned();
            $table->string('pp_url',200)->nullable();
            $table->integer('role_id')->default(1)->nullable(false)->unsigned();
            $table->string('bio_text')->nullable();
            $table->integer('rating')->default(0);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');//->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries');//->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
