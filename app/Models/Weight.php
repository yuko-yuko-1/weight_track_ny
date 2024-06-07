<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'weights';

    protected $fillable = [
        'user_id',
        'record_date',
        'current_weight',
    ];

    protected $casts = [
        'record_date' => 'datetime:Y-m-d',
    ];

    // ユーザーとのリレーションシップ
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
