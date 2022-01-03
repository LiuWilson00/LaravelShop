<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSearchKeyAndOrderIndexAndEnabledInBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
            $table->string('saerch_key');
            $table->boolean('enabled')->default(false);
            $table->unsignedInteger('order_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
            $table->dropColumn('saerch_key');
            $table->dropColumn('enabled');
            $table->dropColumn('order_index');
        });
    }
}
