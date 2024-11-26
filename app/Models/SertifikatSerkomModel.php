<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SertifikatSerkomModel extends Model
{
    use HasFactory;

    protected $fillable = ['serkom_id', 'file_name', 'file_path'];

    protected $table = 'sertifikat_serkom';

    public function serkom(): BelongsTo
    {
        return $this->belongsTo(SertifikasiKompetensiModel::class, 'serkom_id', 'id');
    }
}
