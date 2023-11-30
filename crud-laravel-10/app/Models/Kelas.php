<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'idkelas';
    
    protected $fillable = [
        'idkelas',
        'nip',
        'ta',
        'kelas',
        'jurusan',
    ];
}
