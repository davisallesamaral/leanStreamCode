<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCampo1NoProduto extends Migration
{
    //php artisan migrate
    public function up()
    {
        Schema::table('weathers', function($table) {
            $table->city('city', 50);
        });
    }

    //php artisan migrate:rollback
    public function down()
    {
        Schema::table('weathers', function($table) {
            $table->dropColumn('city');
        });
    }
}
