<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weather;
use App\Http\Services\Weather\WeatherServices;
use Validator;
class WeatherController extends Controller
{

   public function __construct()
    {
        $this->service = new WeatherServices();
    }
    public function index()
    {
        try {
            $weather = $this->service->getAll();
            return view('admin.pages.weather.list-weather', compact('weather'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.weather.add-weather');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required',
            'marathi_title' => 'required',
            'english_url' => 'required',
            'marathi_url' => 'required',
            
         ];
    $messages = [   
        'english_title'=>'Please  enter english title.',
        'marathi_title'=>'Please  enter marathi title.',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-weather')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_weather = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_weather)
            {

                $msg = $add_weather['msg'];
                $status = $add_weather['status'];
                if($status=='success') {
                    return redirect('list-weather')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-weather')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-weather')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $weather = Weather::find($request->edit_id);
        return view('admin.pages.weather.edit-weather', compact('weather'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required',
        'marathi_title' => 'required',
        'english_url' => 'required',
        'marathi_url' => 'required',
        
     ];
    $messages = [   
        'english_title'=>'required',
        'marathi_title'=>'required',
        'english_url'=>'required',
        'marathi_url'=>'required',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_weather = $this->service->updateAll($request);
            if ($update_weather) {
                $msg = $update_weather['msg'];
                $status = $update_weather['status'];
                if ($status == 'success') {
                    return redirect('list-weather')->with(compact('msg', 'status'));
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
            $weathers = $this->service->getById($request->show_id);
            return view('admin.pages.weather.show-weather', compact('weathers'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            // dd($request->delete_id);
            $weather = $this->service->deleteById($request->delete_id);
            return redirect('list-weather')->with('flash_message', 'Deleted!');  
        } catch (\Exception $e) {
            return $e;
        }
    }   

}