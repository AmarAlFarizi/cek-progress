<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'publisher_code'];

    public function manuscripts()
    {
        return $this->hasMany(Manuscript::class);
    }
}
