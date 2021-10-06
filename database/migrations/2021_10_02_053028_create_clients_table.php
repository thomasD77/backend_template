<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->text('remarks')->nullable();
            $table->string('testimonial_send')->nullable();
            $table->integer('loyal_id')->index()->nullable();
            $table->integer('address_id')->index()->nullable();
            $table->string('source_id')->index()->nullable();
            $table->boolean('archived')->default(0);
            $table->timestamps();
        });

        DB::table('clients')->insert([                                         // Delete for Live website
            'firstname' => 'Frank',
            'lastname' => 'Welvaert',
            'email' => 'frank.welvaert@eigenkweek.be',
            'remarks' => 'VRT',
            'testimonial_send' => 'OK',
            'loyal_id' => 1,
            'address_id' => 1,
            'source_id' => 1,
        ]);

        DB::table('clients')->insert([                                         // Delete for Live website
            'firstname' => 'Paula',
            'lastname' => 'Debruyne',
            'email' => 'paula.debruyne@gmail.com',
            'remarks' => 'fake',
            'testimonial_send' => 'OK',
            'loyal_id' => 1,
            'address_id' => 1,
            'source_id' => 1,
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
