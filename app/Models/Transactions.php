<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Book
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}