<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    public function getTagListAttribute()
    {
        // retorna um atributo dinamico contendo as tags do post corrente para serem exibidos na tela de edicao do post
        $tags = $this->tags()->lists('name')->all();
        return implode(', ', $tags);
    }
}
