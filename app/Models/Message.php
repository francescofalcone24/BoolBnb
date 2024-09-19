<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suite;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'email',
        'name',
        'date',
        'suite_id',
        'suite'
    ];

    public function suite()
    {
        return $this->belongsTo(Suite::class);
    }
}
