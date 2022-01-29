<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name',50)->nullable(false);
            $table->timestamps();
        });

        DB::table('roles')->insert(array(
            ['role_name'=>'Member'],
            ['role_name'=>'Moderator'],
            ['role_name'=>'Blog Author'],
            ['role_name'=>'Developer'],
            ['role_name'=>'Administrator']
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
