<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationsModel;

class LocationsController extends Controller
{
    public function locations(){
        return response()->json(LocationsModel::get(), 200);
    }
	
	public function locationsById($id){
        return response()->json(LocationsModel::find($id), 200);
    }

    public function locationsSave(Request $request){
        $locations = LocationsModel::create($request->all());
        return response()->json($locations, 201);
    }
}
