<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model untuk tabel 'scores'.
 *
 * @property int $id
 * @property int $user_id ID dari user yang memiliki skor
 * @property int $score Jumlah skor yang didapat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user Relasi ke model User
 */
class Score extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     *
     * Properti ini sangat penting untuk keamanan. Laravel secara default memblokir
     * semua input dari form atau API agar tidak bisa langsung disimpan ke database.
     * Dengan mendefinisikan 'user_id' dan 'score' di sini, kita secara eksplisit
     * memberitahu Laravel bahwa kedua kolom ini aman untuk diisi melalui metode
     * seperti `Score::create()`.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'score',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model User.
     *
     * Fungsi ini menyatakan bahwa setiap record 'Score' pasti "milik" satu 'User'.
     * Ini memungkinkan kita untuk melakukan query seperti `$score->user` untuk mendapatkan
     * detail user yang terkait dengan skor tersebut. Ini juga yang membuat
     * `Score::with('user')->get()` di ScoreController bisa berjalan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
