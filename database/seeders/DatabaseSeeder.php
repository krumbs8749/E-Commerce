<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Load user
        Models\AbUser::truncate();

        $csvFile = fopen(base_path("database/data/user.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Models\AbUser::create([
                    "id" => $data['0'],
                    "ab_name" => $data['1'],
                    "ab_password" => $data['2'],
                    "ab_mail" => $data['3'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

        // Load articles
        Models\AbArticle::truncate();

        $csvFile = fopen(base_path("database/data/articles.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Models\AbArticle::create([
                    "id" => $data['0'],
                    "ab_name" => $data['1'],
                    "ab_price" => $data['2'],
                    "ab_description" => $data['3'],
                    "ab_creator_id" => $data['4'],
                    "ab_createDate" => $data['5'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

        // Load article categories
        Models\AbArticlecategory::truncate();

        $csvFile = fopen(base_path("database/data/articlecategory.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Models\AbArticlecategory::create([
                    "id" => $data['0'],
                    "ab_name" => $data['1'],
                    "ab_parent" => $data['2'] === 'NULL' ? NULL : $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
