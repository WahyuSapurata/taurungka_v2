<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class DataMakassar extends Model
{
    use HasFactory;

    protected $table = 'data_makassars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'nama',
        'nilai',
        'satuan',
        'icon',
        'position',
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
