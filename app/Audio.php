<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable = ['filename', 'tagname', 'content', 'cat_id'];

    public function category()
    {
        return $this->belongsTo('\App\Category');
    }
}
