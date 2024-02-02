<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('header_text');
            $table->string('banner_image');
            $table->string('banner_title');
            $table->string('banner_subtitle');
            $table->longtext('banner_offer_text');
            $table->string('second_section_heading');
            $table->longtext('second_section_text');
            $table->longtext('slider_data');
            $table->string('third_section_title');
            $table->longtext('third_section_text');
            $table->string('process_section_title');
            $table->longtext('process_section_process');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
