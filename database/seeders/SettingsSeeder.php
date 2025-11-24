<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'logo' => 'test.png',
                'hero_banner' => 'banner.jpg',
                'top_banner1' => 'banner1.jpg',
                'top_banner2' => 'banner2.jpg',
                'top_banner3' => 'banner3.jpg',
                'address' => 'Uttra, Dhaka-1230',
                'phone' => '+8801XXXXXXXX',
                'email' => 'test@gmail.com',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://x.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/'
            ]
        ];
        
        Settings::insert($settings);
    }
}
