<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prospects_website',
        'prospects_goal',
        'budget',
        'publications_packages',
        'parameters',
        'terms',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
