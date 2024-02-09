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
        Schema::create('facility_contents', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('banner_text')->nullable();
            $table->text('second_section_title')->nullable();
            $table->longtext('second_section_description')->nullable();
            $table->string('third_section_title')->nullable();
            $table->string('third_section_image')->nullable();
            $table->longtext('third_section_left_text')->nullable();
            $table->longtext('third_section_right_text')->nullable();
            $table->string('fourth_section_title')->nullable();
            $table->string('fourth_section_right_image')->nullable();
            $table->longtext('fourth_section_left_text')->nullable();
            $table->string('fifth_section_title')->nullable();
            $table->longtext('fifth_section_text')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_contents');
    }
};
