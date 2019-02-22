<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unique();
            $table->string('name', 250);
            $table->ENUM('role_group', ['SUPER_ADMIN', 'ADMIN', 'MASTER', 'SUB_MASTER', 'AGENT'])
                ->comment("List of Roles Groups");
            $table->ENUM('guard_name', ['WEB', 'API'])->comment("List of Guard Name in Roles");
            $table->boolean('is_default')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
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
