<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
{
    DB::table('pages')->insert([
        [
            'title' => 'Terms & Conditions',
            'content' => 'Your terms and conditions content here...',
            'banner_image' => 'path/to/terms-banner.jpg', // Add the banner image path
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Privacy Policy',
            'content' => 'Your privacy policy content here...',
            'banner_image' => 'path/to/privacy-banner.jpg', // Add the banner image path
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}