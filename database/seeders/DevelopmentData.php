<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class DevelopmentData extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $csv = Reader::createFromPath('database/data/article_has_articlecategory.csv', 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        DB::table("ab_article_has_category")->truncate();

        $article_category = $header[0];
        $article_id = $header[1];

        foreach ($records as $record){
            DB::table("ab_article_has_category")
                ->insert([
                    $article_category => $record[$article_category],
                    $article_id => $record[$article_id ]
                ]);
        }
    }

}
