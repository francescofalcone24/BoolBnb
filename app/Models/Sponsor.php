<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suite;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'period',
        'price',
    ];
    
    public function suite ()
    {
        return $this->belongsToMany(Suite::class, 'suite_sponsor');
        // return $this->belongsToMany('App\Models\Project');
    }
}
