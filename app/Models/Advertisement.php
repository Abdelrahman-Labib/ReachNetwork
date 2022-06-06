<?php

namespace App\Models;

use App\Traits\WithWhereHas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory, WithWhereHas;

    protected $fillable = [
        'category_id',
        'user_id',
        'type',
        'title',
        'description',
        'start_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function scopeTomorrow($query)
    {
        $query->whereDate('start_date', Carbon::tomorrow());
    }
}
