<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSequences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // DB::statement(" CREATE SEQUENCE teste START 1 ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // DB::statement(" DROP SEQUENCE teste ");
    }
}
