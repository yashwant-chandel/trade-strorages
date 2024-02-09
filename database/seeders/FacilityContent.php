<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilityContent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facility_contents')->truncate();
        DB::table('home_contents')->insert([
            'banner_image' => '',
            'banner_text' => '',
            'second_section_title' => '',
            'second_section_description' => '',
            'third_section_title' => '',
            'third_section_image' => '',
            'third_section_left_text' => '',
            'third_section_right_text' => '',
            'fourth_section_title' => '',
            'fourth_section_right_image' => '',
            'fourth_section_left_text' => '',
            'fifth_section_title' => '',
            'fifth_section_text' => '',
            'status' => 1
        ]);
    }
}
