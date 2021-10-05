<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('booking_statuses')->insert([
            'name' => 'pending'
        ]);

        DB::table('booking_statuses')->insert([
            'name' => 'approved'
        ]);

        DB::table('booking_statuses')->insert([
            'name' => 'cancelled'
        ]);

        DB::table('booking_statuses')->insert([
            'name' => 'completed'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_statuses');
    }
}
