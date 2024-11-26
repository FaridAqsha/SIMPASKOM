<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class MateriSerkomModel extends Model
{
    use HasFactory;

    protected $fillable = ['sertifikasi_kompetensi_model_id', 'file_name', 'file_path'];

    protected $table = 'materi_serkom';

    public function serkom(): BelongsTo
    {
        return $this->belongsTo(SertifikasiKompetensiModel::class, 'sertifikasi_kompetensi_model_id', 'id');
    }
}
