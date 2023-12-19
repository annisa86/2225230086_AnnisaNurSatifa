<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakaianModel extends Model
{
    use HasFactory;
    protected $table = "pakaian";
    protected $primaryKey = "id_pakaian";
    protected $fillable = ['id_pakaian',
                        'merek_pakaian',
                        'jenis_pakaian',
                        'ukuran',
                        'harga'];
}
