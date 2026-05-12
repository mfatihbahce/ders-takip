<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@kesfetlab.local'],
            [
                'name' => 'Yonetici',
                'password' => Hash::make('admin123'),
            ]
        );

        SiteSetting::query()->firstOrCreate([], [
            'site_name' => 'Keşfetlab Akademi',
            'contact_email' => null,
            'contact_phone' => null,
            'logo_path' => null,
        ]);

        $defaults = [
            'Robotik',
            'İngilizce',
            'Akademi',
            'Resim',
            'Piyano',
            'Değerler eğitimi',
        ];

        foreach ($defaults as $name) {
            SchoolClass::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
