<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNameColumnInTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->renameColumn('name', 'shipper_name');
            $table->string('shipper_phone');
            $table->string('shipper_address');
            $table->renameColumn('size','consignee_name');
            $table->renameColumn('receiver_email', 'consignee_address');
            $table->renameColumn('receiver_phone_number', 'consignee_phone');
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
            $table->renameColumn('shipper_name', 'name');
            $table->dropColumn('shipper_phone');
            $table->dropColumn('shipper_address');
            $table->renameColumn('consignee_name', 'size');
            $table->renameColumn('consignee_address', 'receiver_email');
            $table->renameColumn('consignee_phone', 'receiver_phone_number');

        });
    }
}
