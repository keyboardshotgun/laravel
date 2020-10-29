<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // protected $table = 'persons'; // 첫 줄에 처리해줘야 함.
    // public $timestamps = false; // 라라벨 tinker는 삽입시 데이터 컬럼명이 updated_at 이여야 하는데 , 그러지 않은 경우위해
    protected $fillable = ['title','content'];

    public function user()
    {
        return $this->belongsTo(User::class);
        // User model과 관계되어 있다고 표기 , 반대로 User 에는 Articles를 가지고 있다고 표기해줘야 함.
    }
}
