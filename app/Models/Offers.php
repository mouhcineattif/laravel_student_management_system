<?php

namespace App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title','description','media','offer_type','student_id'
    ];
    public function student(){
        return $this->belongsTo(Student::class)->withTrashed();;
    }
}
