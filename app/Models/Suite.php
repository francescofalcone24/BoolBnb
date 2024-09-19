<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;
use App\Models\Visual;
use App\Models\Sponsor;
use App\Models\Service;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'title',
        'room',
        'bed',
        'bathroom',
        'squareM',
        'address',
        'longitude',
        'latitude',
        'img',
        'visible',
        'sponsor',
        'tot_visuals',
        'user_id'
    ];
    // uno a molti
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function visuals(){
        return $this->hasMany(Visual::class);
    }


    // molti a molti
    // public function sponsors()
    // {
    //     return $this->belongsToMany(Sponsor::class, 'suite_sponsor');
    //     // return $this->belongsToMany('App\Models\Technology');
    // }
// technologies
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'suite_sponsor')->withTimestamps()->withPivot(['sponsor_name']);
    }
    // public function getName(){
    //     return this->belongsToMany(Sponsor::class,'suite_sponsor')
    // }


    public function sponsor()
    {
         return $this->hasOne(SuiteSponsor::class, 'suite_id', 'id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'suite_service')->withPivot('service_id')->withTimestamps();
        // return $this->belongsToMany('App\Models\Technology');
    }





    public function getNameOfCourse(){
        return $this->belongsToMany(Sponsor::class, 'sponsor_name' , 'name');
    }
   
}



