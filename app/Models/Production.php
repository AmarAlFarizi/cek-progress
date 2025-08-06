<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Production extends Model
{
    use HasFactory;

    protected $fillable = ['manuscript_id', 'start_date', 'status'];

    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
}
