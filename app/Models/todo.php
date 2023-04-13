<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function tag(){
    return $this->belongsTo('App\Models\tag');
}

    public function user(){
    return $this->belongsTo('App\Models\user');
}
}
