<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Database\Eloquent\Casts\Json;
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
        $postData = $rd->post();

        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
            return "Fehler";
        }

        if($postData['art_price'] < 0 || $postData['art_name'] === ""){
             echo "Fehlerhafte Eingabe";
             exit();
        }

         $new_article = new Models\AbArticle;

         $new_article->ab_name = $postData['art_name'];
         $new_article->ab_price = $postData['art_price'];
         $new_article->ab_description = $postData['art_description'];
         $new_article->ab_creator_id = 1;
         $new_article->ab_createDate = date_format(new \DateTime(), 'Y-m-d H:i:s');
         $new_article->save();

         return "Erfolgreich";
        // return view
        //return redirect()->route('outputArticles');
    }
    public function insertNewArticle(Request $rd){
        return view ('newArticle',[] );
    }

    public function vueArticles(Request $rd) {
        if(!isset($rd['search'])){
            $articles = Models\AbArticle::all();

        }else{
            $articles = Models\AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')->get();
        }
        $articlesCategory = Models\AbArticlecategory::pluck('ab_name');
        $articles_length = count($articles);

        $enableLogIn = $rd->session()->get('abalo_user') ? $rd->session()->get('abalo_user'): 'null';
        $userID = $rd->session()->get('abalo_id') ? $rd->session()->get('abalo_id'): 'null';


        return view('vueArticles', ['articles' => $articles, 'articles_categories' => $articlesCategory, 'articles_length' => $articles_length, 'enableLogIn' => $enableLogIn, 'userId' => $userID],);
    }


    public function impressum(Request $rd) {
        $articlesCategory = Models\AbArticlecategory::pluck('ab_name');

        return view('impressum', ['articles_categories' => $articlesCategory]);
    }

}

