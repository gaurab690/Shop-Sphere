<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'store_name', 
        'admin_email',
        'contact_number', 
        'store_logo',
    ];
}
