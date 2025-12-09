<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    use HasFactory;

    // Table name (optional kung standard plural form)
    protected $table = 'admin_requests';

    // Fillable fields para sa mass assignment
    protected $fillable = [
        'user_id',      // sino nag send ng request (student)
        'message',      // content ng request
        'status',       // pending, approved, rejected
    ];

    // Relationship: request belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}