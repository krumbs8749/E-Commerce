<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  AbArticleHasCategory extends Model
{
    use HasFactory;

    protected $table = 'ab_article_has_category';

    public $timestamps = false;

}
