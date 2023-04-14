<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistoryModel;

class UserController extends Controller
{
    public function index() {
        $ConstitutionDetails = ConstitutionHistoryModel::all();
        return view('admin.aboutus.index')->with('ConstitutionDetails', $ConstitutionDetails);
    }
    public function create() {
        return view ('admin.aboutus.create');
    }
    
    // public function index()
    // {
    //     $ConstitutionDetails = ConstitutionHistoryModel::all();
    //     //   print_r($ConstitutionDetails);
    //     //   die();
    //     return view ('admin.aboutus.index')->with('ConstitutionDetails', $ConstitutionDetails);       
    // }
    // ----------- [ Form validate ] -----------
    public function store(Request $request) {

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
        
        $user           =       ConstitutionHistoryModel::create($registrationArray);
       

        if(!is_null($user)) {
            return back()->with("success", "Success! Registration completed");
        }

        else {
            return back()->with("failed", "Alert! Failed to register");
        }
    }
}
