<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function barangs(){
        return $this->belongsTo(Barang::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    
}
