<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'tag_id',
    ];

    public function tag(){
    return $this->belongsTo('App\Models\Tag');
    }

    public function user(){
    return $this->belongsTo('App\Models\User');
    }

    public function doSearch($keyword, $tag_id)
    {
    $query = todo::where('title', 'like', '%' . $keyword . '%');
    if (!empty($tag_id)) {
        $query->where('tag_id', $tag_id);
    }
    return $query->get();
    }

    public function tagSelected($tag_id)
{
    return $this->tag_id == $tag_id ? 'selected' : '';
}

}
