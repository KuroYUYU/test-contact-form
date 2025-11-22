<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // ローカルスコープにて検索ロジックを作成
    public function scopeKeywordSearch($query, $keyword)
    {
        //  未選択時はそのまま返す
        if (empty($keyword)) {
            return $query;
        }

        //  姓、名、フルネーム、メールアドレスでの検索と部分一致検索の実装
        return $query->where(function ($q) use ($keyword) {
            $q->where('last_name', 'like', "%{$keyword}%")
                ->orWhere('first_name', 'like', "%{$keyword}%")
                ->orWhereRaw("CONCAT(last_name, first_name) like ?", ["%{$keyword}%"])
                ->orWhere('email', 'like', "%{$keyword}%");
        });
    }

    public function scopeGenderSearch($query, $gender)
    {
        //  未選択時はそのまま返す
        if (empty($gender)) {
            return $query;
        }

        return $query->where('gender', $gender);
    }

    public function scopeCategorySearch($query, $categoryId)
    {
        //  未選択時はそのまま返す
        if (empty($categoryId)) {
            return $query;
        }

        return $query->where('category_id', $categoryId);
    }

    public function scopeDateSearch($query, $date)
    {
        //  未選択時はそのまま返す
        if (empty($date)) {
            return $query;
        }

        return $query->whereDate('created_at', $date);
    }
}
