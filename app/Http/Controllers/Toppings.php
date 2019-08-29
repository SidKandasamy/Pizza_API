<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topping;


class Toppings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Topping::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get post request data for name of toppings
        $data = $request->only(["name"]);

        // create topping with data and store in DB
        $topping = Topping::create($data);

        // return the topping along with a 201 status code
        return response($topping, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Topping::find($id);
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
            // find the current article
        $topping = Topping::find($id);

        // get the request data
        $data = $request->only(["name"]);

        // update the topping name
        $topping->fill($data)->save();

        // return the updated version
        return $topping;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topping = Topping::find($id);
        $topping->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
