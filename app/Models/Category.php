<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'name',
    ];

    public function scopeActive($query)
    {
        $query->where('active', Constant::CATEGORY_STATUS['Active']);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
