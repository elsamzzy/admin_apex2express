<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->string('name');
            $table->string('size');
            $table->string('mode');
            $table->string('date');
            $table->string('location');
            $table->string('description')->nullable();
            $table->uuid('track_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'size',
                'mode',
                'date',
                'location',
                'description',
                'track_id'
            ]);
        });
    }
}
