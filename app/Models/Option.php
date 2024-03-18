<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    public $fillable=['name','department_id','description'];

    public function department()
    {
      return $this->belongsTo(Department::class,'department_id');
    }
    public function user()
    {
      return $this->belongTo(User::class);
    }
    public function documents()
    {
      return $this->hasMany(Document::class);
    }
}
