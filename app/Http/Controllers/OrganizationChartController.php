<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationChart;

class OrganizationChartController extends Controller
{
    public function index()
    {
        $organizationCharts = OrganizationChart::all();
        // print_r($contacts);
        // die();
      return view ('admin.aboutus.organizationChart.index')->with('organizationCharts', $organizationCharts);
    }

    public function create()
    {
        return view('admin.aboutus.organizationchart.create');
    }
 
  
    public function store(Request $request)
    {
        $request->validate([
            'fld_english_title'=>'required',
            'fld_marathi_title'=>'required',
            'fld_english_image'=>'required',
            'fld_marathi_image'=>'required',
        ]);

         $registrationArray  =   array( 
            "fld_english_title"    => $request->fld_english_title,
            "fld_marathi_title"     => $request->fld_marathi_title,
            "fld_english_image"  => $request->fld_english_image,
            "fld_marathi_image"  =>  $request->fld_marathi_image,
        );

        $organizationCharts = OrganizationChart::create($registrationArray);
        // print_r($ConstitutionHistory);
        // die();
        if(!is_null($organizationCharts)) { 
            return back()->with("success", "Constitution History completed successfully");
        }

        else {
            return back()->with("failed", "Constitution History failed. Try again.");
        }
    }
}
