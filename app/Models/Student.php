<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends User
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'filiere',
        'massar',
        'date_de_naissance',
        'password',
        'image'
    ];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function getImageAttribute($value){
        return $value ?? 'default-profile.png';
    }
    public function offers(){
        return $this->hasMany(Offers::class);
    }
}
