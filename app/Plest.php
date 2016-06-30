<?php

namespace App;

use Exception;
use File;
use Illuminate\Database\Eloquent\Model;

class Plest extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function getThumbnailAttribute()
    {
        return $this->images()->first();
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

    public function copyEngine()
    {
        $source = storage_path('app/engines/prototype');
        $dest = storage_path('app/public/games/' . $this->id);

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
}
