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

class Student extends Model implements HasMedia
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function languageTest()
    {
        return $this->belongsTo(LanguageTest::class, 'lang_id', 'id');
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('thumb')
                    ->fit('crop', 200, 200);
            });

        $this->addMediaCollection('nid_birth')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf';
            });

        $this->addMediaCollection('passport')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf';
            });

        $this->addMediaCollection('language_certificate')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf';
            });

        $this->addMediaCollection('signature')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf';
            });
    }
}
