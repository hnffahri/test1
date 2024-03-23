<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "Guru";
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nip', 'alamat'];
}
