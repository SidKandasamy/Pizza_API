<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;




class Pizza extends Model
{
    protected $fillable = ["name"];
    public $timestamps = false;

    

    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }

    public function toppings()
    {
        return $this->belongsToMany(Topping::class);
    }

    public function setToppings(Array $toppings)
    {
    // update the pivot table with toppings IDs
    $this->toppings()->sync($toppings);
    return $this;
    }

}
