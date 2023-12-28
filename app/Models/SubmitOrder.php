<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmitOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_name',
        'client_website',
        'publications_packages',
        'order_total',
        'payment_method',
        'terms',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
