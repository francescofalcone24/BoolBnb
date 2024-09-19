<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suite;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'description',
    ];

    public function suites()
    {
        return $this->belongsToMany(Suite::class, 'suite_sponsor')->withTimestamps();
        // return $this->belongsToMany('App\Models\Project');
    }
}
