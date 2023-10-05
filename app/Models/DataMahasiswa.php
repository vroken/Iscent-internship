<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class DataMahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $with = ['users'];

    protected $fillable = [
        'status_mahasiswa',
        'jenis_magang',
        'jenjang_pendidikan',
        'universitas',
        'jurusan',
        'internship_start_date',
        'internship_end_date',
        'tema',
        'surat_pengantar',
        'proposal',
        'transkip',
        'cv',
        'sertifikat',
        'foto',
        'lokasi_magang',
        'role_magang',
        // 'pdf_contents',
        'mahasiswa_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }
}
