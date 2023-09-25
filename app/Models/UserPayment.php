<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;
    protected $table = 'UserPayments';

    protected $fillable = [
        'id_user',
        'monto',
        'codigoCamp',
        'img',
        'estado',
    ];

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
