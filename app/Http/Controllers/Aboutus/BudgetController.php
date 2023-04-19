<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Http\Services\AboutUs\BudgetServices;
use Validator;
class BudgetController extends Controller
{

   public function __construct()
    {
        $this->service = new BudgetServices();
    }
    public function index()
    {
        try {
            $budgets = $this->service->getAllBudgets();
            return view('admin.pages.aboutus.budget.list-budget', compact('budgets'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addBudget()
    {
        return view('admin.pages.aboutus.budget.add-budget');
    }

    public function budget(Request $request) {
    $messages = [   
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_description.required' => 'Please enter english description.',
        'marathi_description.required' => 'Please enter marathi description.',
    ];

    try {
        $validation = Validator::make($request->all(),$messages);
        if($validation->fails() )
        {
            return redirect('add-budget')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_budget = $this->service->budget($request);
            if($add_budget)
            {

                $msg = $add_budget['msg'];
                $status = $add_budget['status'];
                if($status=='success') {
                    return redirect('list-budget')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-budget')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-budget')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $budgets = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.budget.show-budget', compact('budgets'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit($id)
    {
        $budgets = Budget::find($id);
        return view('admin.pages.aboutus.budget.edit', compact('budgets'));
    }
    public function update(Request $request, $id)
{
    $messages = [   
        'english_title.required' => 'Please enter English title.',
        'marathi_title.required' => 'Please enter Marathi title.',
        'english_description.required' => 'Please enter English description.',
        'marathi_description.required' => 'Please enter Marathi description.',
    ];

    try {
        $validation = Validator::make($request->all(), $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_budget = $this->service->updateBudget($id, $request);
            if ($update_budget) {
                $msg = $update_budget['msg'];
                $status = $update_budget['status'];
                if ($status == 'success') {
                    return redirect('list-budget')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        }
    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}



    // public function update(Request $request, $id)
    // {
    //     $budgets = Budget::find($id);
    //     $input = $request->all();
    //     $budgets->update($input);
    //     return redirect('budget')->with('flash_message', 'Budget Updated!');  
    // }



    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $budgets = $this->service->delete($request->delete_id);
            return redirect('list-budget')->with('flash_message', 'Deleted!');  
            // return view('admin.pages.aboutus.budget.show-budget', compact('budgets'));
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
