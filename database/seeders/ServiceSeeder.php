<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConsultationService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ConsultationService::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Personal Counseling'],
            ['name' => 'Social Counseling'],
            ['name' => 'Career Counseling'],
            ['name' => 'Study Counseling'],
            ['name' => 'Socialization career counseling'],
        ];

        foreach ($data as $item) {
                ConsultationService::insert([
                    'name' => $item['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }
    }
}
