<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons'; // 첫 줄에 처리해줘야 함.
    public $timestamps = false; // 라라벨 tinker는 삽입시 데이터 컬럼명이 updated_at 이여야 하는데 , 그러지 않은 경우위해
    protected $fillable = ['user_id','pass_wd','name'];
}
