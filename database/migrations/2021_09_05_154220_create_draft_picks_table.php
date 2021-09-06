<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftPicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_picks', function (Blueprint $table) {
            $table->id();
            $table->integer('draft_id');
            $table->integer('team_id');
            $table->integer('player_id');
            $table->integer('round');
            $table->integer('pick_number');
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
        Schema::dropIfExists('draft_picks');
    }
}
