<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suite;

class Visual extends Model
{
    use HasFactory;
    protected $fillable = [
        'suite_id',
        'ip_address',
    ];

    public function suite()
    {
        return $this->belongsTo(Suite::class);
    }
}
