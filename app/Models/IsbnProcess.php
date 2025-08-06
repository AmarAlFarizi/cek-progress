<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IsbnProcess extends Model
{
    use HasFactory;

    protected $fillable = ['manuscript_id', 'submitted_at', 'issued_at', 'isbn_number'];

    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
}
