<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Units\Unit;
use Illuminate\Http\Request;

class unitController extends Controller
{

    // all units
    public function index()
    {
        $units = Unit::all();

        $message = [
            'message' => 'جميع الوحدات',
            'allUnitsData' => $units,
            'status' => 200
        ];

        return response($message, 200);
    }

    // storing new unit
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:25',
            'groupID' => 'required'
        ]);

        // new object from unit model to create new unit
        $units = new Unit();
        $units->name = $request->name;
        $units->groupID = $request->groupID;
        $units->save();

        // message for the response
        $message = [
            'message' => ': تم اضافة :' . $request->name ." - " ."داخل جدول الوحدات ",
            'units' => $units,
        ];

        return response($message, 200);
    }
}
