<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SertifikasiKompetensiModel extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'sertifikasi_kompetensi';
    protected $fillable = [
        'id',
        'id_pengguna',
        'status',
        'nama_pengetahuan',
        'jenis',
        'bidang',
        'waktu',
        'deskripsi',
        'biaya',
        'materi',
        'sertifikat',
        'penyelenggara'
    ];
    
    public $sortable = [
        'id',
        'id_pengguna',
        'status',
        'nama_pengetahuan',
        'jenis',
        'bidang',
        'waktu',
        'deskripsi',
        'biaya',
        'materi',
        'sertifikat',
        'penyelenggara'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }

    public function materi(): HasMany
    {
        return $this->hasMany(MateriSerkomModel::class);
    }

    public function sertifikat(): HasMany
    {
        return $this->hasMany(SertifikatSerkomModel::class);
    }
}
