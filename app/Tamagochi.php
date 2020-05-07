<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tamagochi extends Authenticatable
{
    use Notifiable;
 
    protected $table = "tamagochi";
	
    protected $fillable = [
        'type_id', 'user_id', 'name' 
    ];
 
	public function progress() { 
        return $this->hasOne(TamagochiProgress::class);
	}
	
	public function items() { 
        return $this->hasOne(TamagochiItems::class);
	}
}
