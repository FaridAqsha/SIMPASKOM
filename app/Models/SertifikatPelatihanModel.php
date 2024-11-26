<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SertifikatPelatihanModel extends Model
{
    use HasFactory;

    protected $fillable = ['pelatihan_id', 'file_name', 'file_path'];

    protected $table = 'sertifikat_pelatihan';

    public function pelatihan(): BelongsTo
    {
        return $this->belongsTo(PelatihanModel::class, 'pelatihan_id', 'id');
    }
}
