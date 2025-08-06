<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['manuscript_id', 'courier_name', 'tracking_number', 'shipped_at'];

    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
}
