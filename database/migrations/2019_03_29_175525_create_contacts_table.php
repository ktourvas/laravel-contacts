<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lc_contacts', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('email', 100);
            $table->string('tel', 100);
            $table->string('msg', 1000);
            $table->boolean('opt')->default(0);
            $table->boolean('processed')->default(0);
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
        Schema::drop('lc_contacts');
    }
}
