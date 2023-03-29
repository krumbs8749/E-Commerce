<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbArticlecategory extends Model
{
    use HasFactory;

    protected $table = 'ab_articlecategory';

    public $timestamps = false;

    protected $fillable = ['id','ab_name','ab_description','ab_parent'];
}
