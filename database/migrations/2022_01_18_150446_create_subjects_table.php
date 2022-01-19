<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lecturer');
            $table->string('exam_date');
            $table->timestamps();
        });

        DB::table('subjects')->insert([
        [
            'name' => 'Programowanie w języku Python',
            'lecturer' => 'prof. Patrycja Krauze-Maślankowska',
            'exam_date' => '22.01.2022',
        ],
        [
            'nazwa' => 'Serwisy internetowe w języku PHP',
            'lecturer' => 'prof. Piotr Porzuczek',
            'exam_date' => '23.01.2022',
        ],
        [
            'nazwa' => 'Standardy XML',
            'lecturer' => 'prof. Bartosz Marcinkowski',
            'exam_date' => '22.01.2022',
        ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
