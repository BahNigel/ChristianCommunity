<?php

namespace App\Models;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_has_roles extends Model
{
    use HasFactory;

     protected $fillable = [
        'role_id',
        'model_type',
        'model_id',
    ];

    public function users(){
       return $this->hasOne(User::class);
    }

    public function role(){
        return $this->hasOne(Role::class);
    }
}
