<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakes', function (Blueprint $table) {
            $table->id();
            $table->string('users'); // two account ids of in the duel
            $table->float('amount'); // amount wagered
            $table->bigInteger('currency_id')->unsigned(); // currency type, example: btc, ltc, etc..
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->float('commission'); // amount we get by commission for example lets say 0.01 BTC
            $table->float('fee'); // commission rate - 1% by default.
            $table->float('profit'); // amount of profit for winner
            $table->float('won'); // amount won by winner
            $table->bigInteger('winner_id')->unsigned(); // account id of the winner
            $table->foreign('winner_id')->references('id')->on('users');
            $table->bigInteger('loser_id')->unsigned(); // account id of the loser
            $table->foreign('loser_id')->references('id')->on('users');
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
        Schema::dropIfExists('stakes');
    }
}
