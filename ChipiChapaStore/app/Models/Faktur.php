<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;
    protected $table = 'fakturs';
    protected $fillable = [
        'user_id',
        'nomor_invoice',
        'items',
        'alamat_pengiriman',
        'kode_pos',
        'total_harga'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
