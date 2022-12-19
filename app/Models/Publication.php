<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = ['title','author_id', 'publisher'];

    public function author() {
        return $this->belongsTo('App\Models\Author');
    }
}
