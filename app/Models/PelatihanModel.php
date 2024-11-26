<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PelatihanModel extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $table = 'pelatihan';
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
        return $this->hasMany(MateriPelatihanModel::class);
    }

    public function sertifikat(): HasMany
    {
        return $this->hasMany(SertifikatPelatihanModel::class);
    }
}
