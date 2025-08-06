<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingPackage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function manuscripts()
    {
        return $this->hasMany(Manuscript::class, 'package_id');
    }
}
