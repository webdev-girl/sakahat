<?php

namespace App\Models;

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
