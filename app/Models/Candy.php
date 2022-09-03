<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candy extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getRouteKeyName(){
        return "uuid";
    }

    protected $fillable = [
        'name', 'details'
    ];

}
