<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\DietRequest;


class diet extends Model
{
    protected $fillable = ["name"];

    public $timestamps = false;

    

    public function pizzas()
    {
        return $this->hasMany(Pizza::class);
    }



}
