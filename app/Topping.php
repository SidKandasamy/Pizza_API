<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ToppingRequest;


class Topping extends Model
{
    protected $fillable = ["name"];
    public $timestamps = false;

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }

    public static function parse(array $toppings)
    {
    // turns into a collection and maps over
    return collect($toppings)->map(function ($topping) {
        // remove any blank spaces either side
        $string = trim($topping);
        return static::makeTopping($string);
    });
    }

    private static function makeTopping($string)
    {   
    // check if tag already exists
    $exists = Topping::where("name", $string)->first();

    // if tag exists return it, otherwise create a new one
    return $exists ? $exists : Topping::create(["name" => $string]);
    }



}
