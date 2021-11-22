<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=['from','to','text'];

    public function fromAdminContact(){
        return $this->hasOne(Admin::class,'id','from');
    }
    public function fromMarketerContact(){
        return $this->hasOne(Marketer::class,'id','from');
    }
}
