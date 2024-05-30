<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function wines(){
        return $this->belongsToMany(Wine::class);
    }
}
