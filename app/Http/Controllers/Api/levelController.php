<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GroupDataView\groups_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class levelController extends Controller
{
    //select level controller
    function selectLevel(Request $request)
    {
        $data = $request->validate([
            'levelName' => "required",
            'termName' => "required"
        ]);

        $groups = groups_data::where('Level_name', $data['levelName'])
        ->where('Term_name', $data['termName'])
        ->get();

        $response = [
            'message' => "All Groups for level" . $data['levelName'],
            'group_data' => $groups,
        ];
        return response($response, 200);
    }
}
