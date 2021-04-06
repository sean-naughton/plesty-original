<?php

namespace App;

use Auth;
use Exception;
use File;
use Illuminate\Database\Eloquent\Model;

class Plest extends Model
{
    protected $fillable = ['name', 'description'];

    protected $appends = ['thumbnail', 'favorited'];

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getThumbnailAttribute()
    {
        return $this->images()->first();
    }

    public function getFavoritedAttribute()
    {
        return $this->favorites()
            ->where('user_id', Auth::id())
            ->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function add(Question $question)
    {
        $this->questions()->save($question);
    }

    public function getCountQuestionsAttribute()
    {
        return count($this->questions);
    }

    public function copyEngine($engineId)
    {
        $source = Engine::find($engineId)->folder;

        $dest = storage_path('app/public/games/' . $this->id . '/');

        if (File::copyDirectory($source, $dest)) {
            $this->path = $dest;

            if ( ! File::exists($this->path)) {
                throw new Exception("Invalid File");
            }

            $file = File::get($this->path . '/data.js');
            $file = preg_replace('/{{title}}/i', $this->name, $file);
            File::put($this->path . '/data.js', $file);
        }
    }

    public function favorite()
    {
        $favorite = new Favorite(['user_id' => Auth::id()]);

        $this->favorites()->save($favorite);
    }

    public function unfavorite()
    {
        $this->favorites()
            ->where('user_id', Auth::id())
            ->delete();
    }

    public function isFavorited()
    {
        return $this->favorites()
                    ->where('user_id', Auth::id())
                    ->exists();
    }
}