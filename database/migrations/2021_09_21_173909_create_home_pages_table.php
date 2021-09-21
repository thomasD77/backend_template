<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('input_1')->nullable();
            $table->string('input_2')->nullable();
            $table->string('input_3')->nullable();
            $table->string('input_4')->nullable();
            $table->string('input_5')->nullable();
            $table->string('input_6')->nullable();
            $table->string('input_7')->nullable();
            $table->string('input_8')->nullable();
            $table->string('input_9')->nullable();
            $table->string('input_10')->nullable();

            $table->text('text_1')->nullable();
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('text_4')->nullable();
            $table->text('text_5')->nullable();
            $table->text('text_6')->nullable();
            $table->text('text_7')->nullable();
            $table->text('text_8')->nullable();
            $table->text('text_9')->nullable();
            $table->text('text_10')->nullable();

            $table->timestamps();
        });

        DB::table('home_pages')->insert([
            'input_1' => "",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_pages');
    }
}
