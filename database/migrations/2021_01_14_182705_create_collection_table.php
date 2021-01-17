<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name_collection')->unique();
            $table->string('symbol');
            $table->date('date_of_edition');
            $table->timestamps();
        });
        Schema::table('cards',function(Blueprint $table){
            $table->foreignId('collection_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('cards', function (Blueprint $table){
            $table->dropForeign(['collection_id']);
            $table->dropColumn('collection_id');
        });
        Schema::dropIfExists('collections');
    }
}
