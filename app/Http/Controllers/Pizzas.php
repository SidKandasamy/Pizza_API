<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Diet;
use App\Http\Resources\PizzaResource;
use App\Topping;
use App\Http\Requests\PizzaRequest;


use Illuminate\Http\Request;



class Pizzas extends Controller
{

    public function index()
    {

        return Pizza::all();
    }

    public function pizzaIndex(Topping $topping)
    {

        return PizzaResource::collection($topping->pizzas);;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dietIndex(Diet $diet)
    {

        return PizzaResource::collection($diet->pizzas);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {

        // create the pizza, save the name
        $data = $request->only(["name"]);
        $pizza = Pizza::create($data);

        // find the diet, make the relationship between the two
        $diet = Diet::find($request->get("diet_id"));
        $diet->pizzas()->save($pizza);

        // get the toppings, make the relationshipb between the pizza and its toppings
        $toppings=$request->get("toppings");
        $pizza->setToppings($toppings);

        // return the pizza along with a 201 status code
        return new PizzaResource($pizza);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pizza::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find the current pizza
        $pizza = Pizza::find($id);
        // get the request data
        $data = $request->only(["name"]);
        // update the pizza name
        $pizza->fill($data)->save();


        //find the current diet of the pizza
        $diet = Diet::find($request->get("diet_id"));
        //saving and updating pizza diet
        $diet->pizzas()->save($pizza);

        
        $toppings=$request->get("toppings");
        $pizza->setToppings($toppings);

        // return the updated version
        return new PizzaResource($pizza);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
