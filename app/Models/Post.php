<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $guarded = [];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
//    public static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($post) {
//            // Initialize the Google Cloud Translate client
//            $translate = new TranslateClient();
//
//            // Text to be translated
//            $text = $post->body;
//
//            // Target languages
//            $targetLangs = ['uz', 'ru', 'en'];
//            $translations = [];
//
//            foreach ($targetLangs as $lang) {
//                $result = $translate->translate($text, ['target' => $lang]);
//                $translations[$lang] = $result['text'];
//            }
//            $post->translations = json_encode($translations);
//        });
//    }



}
