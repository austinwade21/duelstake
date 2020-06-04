<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSocialProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('driver', 80);
            $table->string('url', 255)->nullable(true);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('social_providers')->insert(
            array(
                'name' => 'Discord',
                'driver' => 'discord',
                'url' => 'https://discord.com',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_providers');
    }
}
