<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->string('account_status');
            $table->string('user_name');
            $table->bigInteger('item_chestplate_id')->unsigned();
            $table->foreign('item_chestplate_id')->references('id')->on('items');
            $table->bigInteger('item_legs_id')->unsigned();
            $table->foreign('item_legs_id')->references('id')->on('items');
            $table->bigInteger('item_gloves_id')->unsigned();
            $table->foreign('item_gloves_id')->references('id')->on('items');
            $table->bigInteger('item_helmet_id')->unsigned();
            $table->foreign('item_helmet_id')->references('id')->on('items');
            $table->bigInteger('item_shoulder_id')->unsigned();
            $table->foreign('item_shoulder_id')->references('id')->on('items');
            $table->bigInteger('item_boots_id')->unsigned();
            $table->foreign('item_boots_id')->references('id')->on('items');
            $table->bigInteger('item_cape_id')->unsigned();
            $table->foreign('item_cape_id')->references('id')->on('items');
            $table->string('character_gender');
            $table->integer('character_skin');
            $table->double('character_hairstyle');
            $table->string('character_haircolor');
            $table->string('character_weapon');
            $table->float('character_wins');
            $table->float('character_losses');
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
        Schema::dropIfExists('characters');
    }
}
