<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
     protected $table = 'nasabah';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'saldo',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'saldo' => 'decimal:2',
            'created_at' => 'datetime',
        ];
    }
}
