<?php

namespace App\Models;
use App\User;
use App\Message;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class News extends Model implements HasMedia
{
    use HasMediaTrait;
   $newsItem = News::find(1);
   $newsItem->addMedia($pathToFile)->toMediaCollection('images');
   $newsItem->addMediaFromRequest('image')->toMediaCollection('images');
   $newsItem->getMedia('images')->first()->getUrl('thumb')
   $newsItem->addMedia($smallFile)->toMediaCollection('downloads', 'local');
   $newsItem->addMedia($bigFile)->toMediaCollection('downloads', 's3');
}
// namespace App;
//
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\Models\Media;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
//
// class User extends Authenticatable implements HasMedia
// {
//     use Notifiable;
//     use HasMediaTrait;
//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'email', 'password',
//     ];
//
//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
//
//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
//     // * A user can have many messages
//     // *
//     // * @return \Illuminate\Database\Eloquent\Relations\HasMany
//        // *
//    public function messages()
//    {
//      return $this->hasMany(Message::class);
//    }
//     // public function getProfileLinkAttribute(){
//     //     return route('user.show', $this);
//     // }
//     public function registerMediaConversions(Media $media = null)
// {
//     $this->addMediaConversion('thumb')
//         ->width(50)
//         ->height(50);
//     }
// }
