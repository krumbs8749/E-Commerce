<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ArticlesController
{
    public function outputArticles(Request $rd) {
        if(!isset($rd['search'])){
            $articles = Models\AbArticle::all();

        }else{
            $articles = Models\AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')->get();
        }
        $articlesCategory = Models\AbArticlecategory::pluck('ab_name');



        return view('articles', ['articles' => $articles, 'articles_categories' => $articlesCategory]);
    }
    public function setArticles(Request $rd){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
        {
            return 'Fehler';
        }
         $postData = $rd->post();
         Models\AbArticle::create([
             "ab_name" => $postData['art_name'],
             "ab_price" => $postData['art_price'],
             "ab_description" => $postData['art_description'],
             "ab_creator_id" => 1,
             "ab_createDate" => date_format(new \DateTime(), 'Y-m-d H:i:s'),
         ]);

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            return 'Erfolgreich';
        }
        return 'Erfolgreich';
        //return redirect()->route('outputArticles');
    }
    public function insertNewArticle(Request $rd){
        return view ('newArticle',[] );
    }
}
