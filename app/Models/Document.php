<?php

namespace App\Models;

use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Level;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = ['type_id', 'user_id','level_id','supervisor', 'author', 'description', 'extension', 'title', 'file', 'option_id', 'slug', 'description', 'image', 'published_at', 'is_visible'];
  //function to formate the Date
  public function FormatDate($priseService)
  {
      $locale = app()->getLocale();
      Carbon::setLocale($locale);
      $format = $locale === 'en' ? 'F d, Y' : 'd M Y';

      return $priseService ? Carbon::parse($priseService)->translatedFormat($format) : null;
  }

  //Scope
//   public function active(Builder $query): Builder
//   {
//       return $query->where('is_visible','=', 1);
//   }
  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }
  public function option()
  {
    return $this->belongsTo(Option::class,'option_id');
  }
  public function level()
  {
    return $this->belongsTo(Level::class,'level_id');
  }
  public function user()
  {
    return $this->belongsTo(User::class,'user_id');
  }
  // public function keywords()
  // {
  //   return $this->belongsToMany(Keyword::class);
  // }
  public function type()
  {
    return $this->belongsTo(Type::class,'type_id');
  }
}
