<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manuscript extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'package_id',
        'title',
        'status_administrasi',
        'status_layout',
        'status_desain_cover',
        'file_naskah',
        'file_cover',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function package()
    {
        return $this->belongsTo(PublishingPackage::class, 'package_id');
    }

    public function isbn()
    {
        return $this->hasOne(IsbnProcess::class);
    }

    public function production()
    {
        return $this->hasOne(Production::class);
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
}
