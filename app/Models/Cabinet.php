<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabinet extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function users(){
        return $this->belongsToMany(User::class,'user_cabinet')->withPivot('booking_finally_date','user_id','cabinet_id ')->withTimestamps();
    }

  

}
