<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms'; // kalau kamu mau pastikan manual

    protected $fillable = [
        'nomor',
        'judul',
        'date_issued',
        'org',
        'rev',
        'amend',
        'affected_function',
        'type',
        'file_path',
    ];
}


