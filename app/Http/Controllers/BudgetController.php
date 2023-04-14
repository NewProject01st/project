<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::all();
        // print_r($contacts);
        // die();
      return view ('admin.budget.index')->with('budgets', $budgets);
    }
 
    
    public function create()
    {
        return view('admin.budget.create');
    }
 
  
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

        $ConstitutionHistory = Budget::create($registrationArray);
        // print_r($ConstitutionHistory);
        // die();
        if(!is_null($ConstitutionHistory)) { 
            return back()->with("success", "Constitution History completed successfully");
        }

        else {
            return back()->with("failed", "Constitution History failed. Try again.");
        }
    }
    public function edit($id)
    {
        $budgets = Budget::find($id);
        return view('admin.budget.edit')->with('budgets', $budgets);
    }
    public function update(Request $request, $id)
    {
        $budgets = Budget::find($id);
        $input = $request->all();
        $budgets->update($input);
        return redirect('budget')->with('flash_message', 'Budget Updated!');  
    }
    public function destroy($id)
    {
        Budget::destroy($id);
        return redirect('budget')->with('flash_message', 'Budget deleted!');  
    }
}
