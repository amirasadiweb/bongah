<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    
   protected  $fillable=[
       'user_id',
       'street',
       'city',
       'state',
       'country',
       'zip',
       'price',
       'description',
   ];  
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function LocatedAt($zip,$street)
    {
        $street=str_replace('-',' ',$street);
        return static::where(compact('zip','street'))->first();
    }

    public function addphoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function getPriceAttribute($price)
    {
        return number_format($price).' '.'تومان';
    }
}
