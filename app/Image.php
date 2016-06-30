<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{
    protected $fillable = ['path', 'full_size_path'];

    public function plests()
    {
        return $this->morphedByMany(Plest::class, 'imageable');
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'imageable');
    }

    public function answers()
    {
        return $this->morphedByMany(Answer::class, 'imageable');
    }

    public static function createFromPlestThumbnail($thumbnail)
    {
        $id = Auth::id();
        $uniqid = uniqid($id);
        $path = 'storage/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension();
        $fullSizePath = 'storage/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension();

        InterventionImage::make($thumbnail)
            ->save(storage_path('app/public/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension()));

        InterventionImage::make($thumbnail)
            ->resize(50, 50)
            ->save(storage_path('app/public/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension()));

        return new static([
            'path' => $path,
            'full_size_path' => $fullSizePath,
        ]);
    }
}
