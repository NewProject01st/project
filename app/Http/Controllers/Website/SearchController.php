<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MainSubMenus;
use Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search in the database
        $subMenus = MainSubMenus::where('url', 'LIKE', '%' . $query . '%')->get();

        return response()->json($subMenus);
    }
}