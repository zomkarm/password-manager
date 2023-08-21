<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name','website_url','user_id','username','password'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
