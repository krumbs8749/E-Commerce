<?php


namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;

use \Ratchet\Client;


class ArticlesAPIController
{

    public  function APIGetArticle(Request $rd){
        if(!isset($rd['search'])){
            $articles = Models\AbArticle::all();

        }else{
            if(isset($rd['limit']) && isset($rd['offset'])){
                $articles_length = Models\AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')->count();
                $articles = Models\AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')
                                                ->limit($rd['limit'])
                                                ->offset($rd['offset'])
                                                ->get();
            }else {
                $articles = Models\AbArticle::where("ab_name","ILIKE", '%'. $rd['search'].'%')->get();
            }

        }

        return  json_encode(['articles' => $articles, 'articles_length' => $articles_length]);
    }

    public function APIPostArticle(Request $rd){
        $postData = $rd->post();

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

        $id = Models\AbArticle::query()->select()->max('id');

        return json_encode(["latest_ID" => $id]);
    }

    public function APIArticleSold (Request $rd, $id){
        $article_name = Models\AbArticle::where("id", "=", $id)->select('ab_name', 'ab_creator_id')->get();

        \Ratchet\Client\connect('ws://localhost:8080/chat')->then(function($conn) use ($article_name){
            $conn->on('message', function($msg) use ($conn) {
                echo "Received: {$msg}\n";
            });
            echo "testing";
            $conn->send(json_encode([
                'text'=> "Großartig! Ihr Artikel". $article_name[0]['ab_name'] . " wurde erfolgreich verkauf!",
                'type' => 'alert',
                'userId' => $article_name[0]['ab_creator_id']
            ]));
            $conn->close();

        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
        return $article_name[0]['ab_creator_id'];
    }
}

