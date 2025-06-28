<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Ipp extends Model
{
    use HasFactory;

    protected $table = 'ipps';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'tahun',
        'domain',
        'indikator',
    ];

    protected $casts = [
        'indikator' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
