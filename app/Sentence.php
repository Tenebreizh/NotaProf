<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','content', 'user_id',
    ];

    public function user()
    {
       return $this->belongsTo('App\User');
    }
}
