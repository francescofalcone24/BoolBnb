<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiteSponsor extends Model
{
    use HasFactory;
    protected $table = 'suite_sponsor' ;

    public function sponsor(){
        return $this->belongsTo(Sponsor::class, 'sponsor_id', 'id');
    }

    public function suite(){
        return $this->belongsTo(Suite::class, 'suite_id', 'id');
    }
    public function getNameOfCourse(){
        return $this->belongsTo(Sponsor::class, 'sponsor_name' , 'name');
    }
}
