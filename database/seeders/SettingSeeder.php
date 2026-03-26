<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::set('store_name', 'MyShop');
        Setting::set('store_address', 'Jl. Mawar No. 88, Jakarta');
        Setting::set('store_logo', '/images/logo.png');
        Setting::set('hero_image', 'https://images.unsplash.com/photo-1585386959984-a4155224a1b5');
        Setting::set('hero_title', 'Fall Sale 30% OFF');
        Setting::set('hero_subtitle', 'Limited Time Only • Comfort Meets Style');
    }
}
