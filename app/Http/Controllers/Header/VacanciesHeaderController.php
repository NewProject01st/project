<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VacanciesHeader;
use App\Http\Services\Header\VacanciesHeaderServices;
use Validator;
class VacanciesHeaderController extends Controller
{

   public function __construct()
    {
        $this->service = new VacanciesHeaderServices();
    }
    public function index()
    {
        try {
            $vacancy = $this->service->getAll();
            return view('admin.pages.header.vacancy.list-header-vacancies', compact('vacancy'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.header.vacancy.add-header-vacancies');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',  
            'url' => 'required',
            'english_pdf' => 'required',
            'marathi_pdf' => 'required',
            
         ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        'url' => 'required',
        'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-header-vacancies')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_vacancy = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_vacancy)
            {

                $msg = $add_vacancy['msg'];
                $status = $add_vacancy['status'];
                if($status=='success') {
                    return redirect('list-header-vacancies')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-header-vacancies')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-header-vacancies')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = $request->edit_id;
    $vacancy = $this->service->getById($edit_data_id);
    return view('admin.pages.header.vacancy.edit-header-vacancies', compact('vacancy'));
}
  
public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
            'marathi_title' => 'required',
            'url' => 'required',
            // 'english_pdf' => 'required',
            // 'marathi_pdf' => 'required',
     ];
    $messages = [   
        'english_title' => 'required',
        'marathi_title' => 'required',
        'url' => 'required',
        // 'english_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'marathi_pdf' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_tender = $this->service->updateAll($request);
            if ($update_tender) {
                $msg = $update_tender['msg'];
                $status = $update_tender['status'];
                if ($status == 'success') {
                    return redirect('list-header-vacancies')->with(compact('msg', 'status'));
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

 public function show(Request $request)
    {
        try {
            //  dd($request->show_id);
            $vacancy = $this->service->getById($request->show_id);
            return view('admin.pages.header.vacancy.show-header-vacancies', compact('vacancy'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $vacancy = $this->service->deleteById($request->delete_id);
            return redirect('list-header-vacancies')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

   

}