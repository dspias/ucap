<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// spatie media add
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;


class University extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    //get user
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    //get user
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->fit('crop', 200, 200);
            });

        $this->addMediaCollection('cover')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->fit('crop', 1280, 500);
            });

        $this->addMediaCollection('admin')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->fit('crop', 500, 500);
            });
    }
}
