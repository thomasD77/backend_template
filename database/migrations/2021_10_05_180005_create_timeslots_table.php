<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->id();
            $table->string('time_from');
            $table->string('time_to');
            $table->timestamps();
        });

        DB::table('timeslots')->insert([                                         // Delete for Live website
            'time_from' => '08:00',
            'time_to' => '10:00'
        ]);

        DB::table('timeslots')->insert([                                         // Delete for Live website
            'time_from' => '10:00',
            'time_to' => '12:00'
        ]);

        DB::table('timeslots')->insert([                                         // Delete for Live website
            'time_from' => '13:00',
            'time_to' => '15:00'
        ]);

        DB::table('timeslots')->insert([                                         // Delete for Live website
            'time_from' => '15:00',
            'time_to' => '17:00'
        ]);

        DB::table('timeslots')->insert([                                         // Delete for Live website
            'time_from' => '17:30',
            'time_to' => '19:00'
        ]);

        Schema::create('booking_timeslot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('timeslot_id');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('timeslot_id')->references('id')->on('timeslots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeslots');
    }
}

