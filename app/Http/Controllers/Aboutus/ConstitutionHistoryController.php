<?php

namespace App\Http\Controllers\Aboutus;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistoryModel;

class ConstitutionHistoryController extends Controller
{
    public function index()
    {
        $constitutionHistoryModels = ConstitutionHistoryModel::all();
        // print_r($contacts);
        // die();
      return view ('admin.pages.aboutus.constitutionhistory.index')->with('constitutionHistoryModels', $constitutionHistoryModels);
    }
    public function create()
    {
        return view('admin.pages.aboutus.constitutionhistory.create');
    }
     public function store(Request $request)
    {
        $request->validate([
            'english_title'=>'required',
            'marathi_title'=>'required',
            'english_description'=>'required',
            'marathi_description'=>'required',
        ]);

         $registrationArray  =   array( 
            "english_title"    => $request->english_title,
            "marathi_title"     => $request->marathi_title,
            "english_description"  => $request->english_description,
            "marathi_description"  =>  $request->marathi_description,
        );

        $ConstitutionHistory = ConstitutionHistoryModel::create($registrationArray);
        // print_r($ConstitutionHistory);
        // die();
        if(!is_null($ConstitutionHistory)) { 
            return redirect('constitutionHistory')->with('flash_message', 'Constitution History completed successfully'); 
        }

        else {
            return redirect('constitutionHistory')->with('flash_message', 'Constitution History failed. Try again.'); 

        }
    }
    public function show($id)
    {
        $ConstitutionHistory = ConstitutionHistoryModel::find($id);
        return view('admin.pages.aboutus.constitutionhistory.show')->with('ConstitutionHistory', $ConstitutionHistory);
    }
    public function edit($id)
    {
        $constitutionHistoryModels = ConstitutionHistoryModel::find($id);
        return view('admin.pages.aboutus.constitutionhistory.edit')->with('constitutionHistoryModels', $constitutionHistoryModels);
    }
    public function update(Request $request, $id)
    {
        $constitutionHistoryModels = ConstitutionHistoryModel::find($id);
        $input = $request->all();
        $constitutionHistoryModels->update($input);
        return redirect('constitutionHistory')->with('flash_message', 'Constitution History Updated!');  
    }
    public function destroy($id)
    {
        ConstitutionHistoryModel::destroy($id);
        return redirect('constitutionHistory')->with('flash_message', 'Constitution History deleted!');  
    }
}
