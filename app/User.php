<?php

namespace App;

use App\Image;
use Illuminate\Http\Request;
use Laravel\Spark\User as SparkUser;
use Storage;

class User extends SparkUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'date',
        'uses_two_factor_auth' => 'boolean',
    ];

    public function plests()
    {
        return $this->hasMany(Plest::class);
    }

    public function createPlest(Request $request)
    {
        $plest = new Plest($request->except('thumbnail'));

        if ($request->hasFile('thumbnail')) {
            $image = Image::createFromPlestThumbnail($request->file('thumbnail'));
            $this->plests()->save($plest);
            $plest->images()->save($image);
        }

        $plest->copyEngine();

        $this->plests()->save($plest);

        $question = Question::create();

        $plest->add($question);

        return $plest;
    }
}
