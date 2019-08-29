<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\diet;



class diets extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Diet::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get post request data for name of diet
        $data = $request->only(["name"]);

        // create diet with data and store in DB
        $diet = Diet::create($data);

        // return the diet along with a 201 status code
        return response($diet, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Diet::find($id);
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
        $diet = Diet::find($id);

        // get the request data
        $data = $request->only(["name"]);

        // update the diet
        $diet->fill($data)->save();

        // return the updated version
        return $diet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diet = Diet::find($id);
        $diet->delete();
    
        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
