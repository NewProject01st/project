<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistoryModel;

class ConstitutionHistoryController extends Controller
{
    public function index()
    {
        $ConstitutionDetails = ConstitutionHistoryModel::all();
        //   print_r($ConstitutionDetails);
        //   die();
        return view ('admin.aboutus.index')->with('ConstitutionDetails', $ConstitutionDetails);       
    }
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fld_english_title'=>'required',
            'fld_marathi_title'=>'required',
            'fld_english_description'=>'required',
            'fld_marathi_description'=>'required',
        ]);

         $registrationArray  =   array( 
            "fld_english_title"    => $request->fld_english_title,
            "fld_marathi_title"     => $request->fld_marathi_title,
            "fld_english_description"  => $request->fld_english_description,
            "fld_marathi_description"  =>  $request->fld_marathi_description,
        );

        $ConstitutionHistory = ConstitutionHistoryModel::create($registrationArray);
        // print_r($ConstitutionHistory);
        // die();
        if(!is_null($ConstitutionHistory)) { 
            return back()->with("success", "Constitution History completed successfully");
        }

        else {
            return back()->with("failed", "Constitution History failed. Try again.");
        }
    }
    
}
