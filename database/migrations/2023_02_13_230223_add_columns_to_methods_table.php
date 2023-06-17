<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('methods', function (Blueprint $table) {
            $table->tinyInteger('is_bank')->default(0)->after('image');
            $table->string('qrcode_image')->nullable()->after('is_bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('methods', function (Blueprint $table) {
            //
        });
    }
}