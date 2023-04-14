<?php

namespace App\Http\Controllers\Aboutus;

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
      return view ('admin.pages.aboutus.budget.index')->with('budgets', $budgets);
    }
 
    
    public function create()
    {
        return view('admin.pages.aboutus.budget.create');
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

        $budgets = Budget::create($registrationArray);
        // print_r($ConstitutionHistory);
        // die();
        if(!is_null($budgets)) { 
            return redirect('budget')->with('flash_message', 'Budget completed successfully'); 

        }

        else {
            return redirect('budget')->with('flash_message', 'Budget failed. Try again.'); 

        }
    }
    // public function show($id)
    // {
    //     // $budgets = Budget::find($id);
    //     // print_r($budgets);
    //     // die();
    //     return view('admin.pages.aboutus.budget.show');
    // }
 
    public function edit($id)
    {
        $budgets = Budget::find($id);
        return view('admin.pages.aboutus.budget.edit')->with('budgets', $budgets);
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
