<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{
    protected $fillable = ['path', 'full_size_path', 'storage_path'];

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
            'storage_path' => storage_path('app/public/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension()),
        ]);
    }

    public static function createFromAnswerThumbnail($thumbnail, $plest, $answerNum)
    {
        $id = Auth::id();
        $uniqid = uniqid($id);
        $path = 'storage/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension();
        $fullSizePath = 'storage/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension();

        InterventionImage::make($thumbnail)
            ->resize(150, 150)
            ->save(storage_path('app/public/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension()));

        InterventionImage::make($thumbnail)
            ->resize(50, 50)
            ->save(storage_path('app/public/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension()));

        InterventionImage::make($thumbnail)
            ->resize(150, 150)
            ->save($plest->path . 'images/answer' . $answerNum . '.png');

        $image = new static([
            'path' => $path,
            'full_size_path' => $fullSizePath,
            'storage_path' => storage_path('app/public/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension()),
        ]);

        $image->save();

        return $image;
    }

    public static function createFromQuestionThumbnail($thumbnail, $plest)
    {
        $id = Auth::id();
        $uniqid = uniqid($id);
        $path = 'storage/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension();
        $fullSizePath = 'storage/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension();

        InterventionImage::make($thumbnail)
            ->resize(150, 150)
            ->save(storage_path('app/public/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension()));

        InterventionImage::make($thumbnail)
            ->resize(50, 50)
            ->save(storage_path('app/public/images/' . $uniqid . '.' . $thumbnail->getClientOriginalExtension()));

        InterventionImage::make($thumbnail)
            ->resize(150, 150)
            ->save($plest->path . 'images/question.png');

        $image = new static([
            'path' => $path,
            'full_size_path' => $fullSizePath,
            'storage_path' => storage_path('app/public/images/' . $uniqid . '_full.' . $thumbnail->getClientOriginalExtension()),
        ]);

        $image->save();

        return $image;
    }
}
