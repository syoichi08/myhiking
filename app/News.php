<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'area' => 'required',
        'day' => 'required',
        'body' => 'required',
    );
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}