<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_contents')->truncate();
        DB::table('home_contents')->insert([
            'banner_image' => 'Banner1707115124.png',
            'banner_title' => 'Easy Online Rental',
            'banner_subtitle' => 'Skip the counter & go straight to your space.',
            'banner_offer_text' => 'Offer1707115124.png',
            'second_section_heading' => 'Get Started With Exploring Real <br>Estate Options',
            'second_section_text' => "<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>",
            'slider_data' => '[{"image":"SiteContent170711512451.png","text":"Trade Storage"},{"image":"SiteContent170711512477.png","text":"Office Space Leasing"},{"image":"SiteContent170711512462.png","text":"Office Space Leasing"}]',
            'third_section_title' => 'Trade Storage <br><span>Value</span>',
            'third_section_text' => '<p>We are united under one common goal – creating a diverse and inclusive environment where all employees feel valued, included, and excited to be part of a best-in-class team. With over 5,000 team members from all different races, backgrounds, and life experiences, we celebrate inclusion and value the diversity each person brings to Public Storage. We believe our commitment to diversity and inclusion makes us a stronger Company and instills a sense of pride across our teams and the customers we serve.</p>',
            'process_section_title' => 'Here’s how the self-storage <br> process works.',
            'process_section_process' => `[{"image":"SiteContent170711795067.png","text":"<h3>Find a location<\/h3><p>Start by searching for storage near you. With thousands of locations nationwide, we're always just around the corner.<\/p>"},{"image":"SiteContent170711795096.png","text":"<h3>Reserve your unit<\/h3><p>Reserve your unit for free with no obligation, and complete your rental online to save time on move-in day.<\/p>"},{"image":"SiteContent170711795040.png","text":"<h3>Move in<\/h3><p>Find your space and move on in! (Pro tip: Download the Public Storage app to open make move-in a breeze with easy gate access and more!)<\/p>"}]`,
            'status' => 1
        ]);
        
    }
}
