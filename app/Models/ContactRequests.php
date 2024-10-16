<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequests extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone_number',
        'title',
        'description'
    ];
    public function contacts()
    {
        return $this->hasMany(ContactRequests::class);
    }
}
