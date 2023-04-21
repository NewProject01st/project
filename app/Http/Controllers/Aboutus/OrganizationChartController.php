<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationChart;
use App\Http\Services\AboutUs\OrganizationChartServices;
use Validator;
class OrganizationChartController extends Controller
{

   public function __construct()
    {
        $this->service = new OrganizationChartServices();
    }
    public function index()
    {
        try {
            $organizationchart = $this->service->getAll();
            return view('admin.pages.aboutus.organizationChart.list-organizationchart', compact('organizationchart'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.aboutus.organizationChart.add-organizationchart');
    }

    public function store(Request $request) {
        // dd($request);
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
        ];
    $messages = [   
        'english_title.required' => 'Please  enter english title.',
        'marathi_title.required' => 'Please enter marathi title.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-organizationchart')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_organizationchart = $this->service->addAll($request);
            if($add_organizationchart)
            {

                $msg = $add_organizationchart['msg'];
                $status = $add_organizationchart['status'];
                if($status=='success') {
                    return redirect('list-organizationchart')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-organizationchart')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-organizationchart')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $organizationchart = $this->service->getById($request->show_id);
            return view('admin.pages.aboutus.organizationChart.show-organizationchart', compact('organizationchart'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $organizationchart = OrganizationChart::find($request->edit_id);
        return view('admin.pages.aboutus.organizationChart.edit-organizationchart', compact('organizationchart'));
    }
    public function update(Request $request, $id)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required'
        
     ];

    $messages = [   
        'english_title.required' => 'Please enter English title.',
        'marathi_title.required' => 'Please enter Marathi title.',
        'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_organizationchart = $this->service->updateAll($request->edit_id);
            if ($update_organizationchart) {
                $msg = $update_organizationchart['msg'];
                $status = $update_organizationchart['status'];
                if ($status == 'success') {
                    return redirect('list-organizationchart')->with(compact('msg', 'status'));
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
    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $organizationchart = $this->service->deleteById($request->delete_id);
            return redirect('list-organizationchart')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}
