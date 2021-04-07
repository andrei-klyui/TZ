<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use SoftDeletingTrait;

    protected $table = 'book';
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function books()
    {
        return $this->belongsTo('App\Models\User');
    }
}
