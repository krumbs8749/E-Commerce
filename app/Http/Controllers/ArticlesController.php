<?php

namespace App\Http\Controllers;

use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController
{
    public function aufgabe_10(Request $rd) {
        if(!isset($rd['search'])){
            $articles = AbArticle::all();

        }else{
            $articles = AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')->get();
        }



        return view('articles', ['articles' => $articles]);
    }

}
