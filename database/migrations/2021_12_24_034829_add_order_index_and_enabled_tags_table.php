<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIndexAndEnabledTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tags', function (Blueprint $table) {
            $table->unsignedBigInteger('order_index')->default(9999);
            $table->boolean('enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('order_index');
            $table->dropColumn('enabled');
        });
    }
}
