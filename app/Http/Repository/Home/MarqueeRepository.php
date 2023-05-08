<?php
namespace App\Http\Repository\Home;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Marquee
};

class MarqueeRepository  {
	public function getAllMarquee()
    {
        try {
            return Marquee::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addMarquee($request)
{
    try {
        $marquee_data = new Marquee();
        $marquee_data->english_title = $request['english_title'];
        $marquee_data->marathi_title = $request['marathi_title'];
        $marquee_data->save();       
     
		return $marquee_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $marquee = Marquee::find($id);
        if ($marquee) {
            return $marquee;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id budget.',
            'status' => 'error'
        ];
    }
}
public function updateMarquee($request)
{
    try {
        $marquee_data = Marquee::find($request->id);
        $marquee_data->english_title = $request['english_title'];
        $marquee_data->marathi_title = $request['marathi_title'];

       
        $marquee_data->update();  
        
    //    dd($budget_data);
        // print_r($budget_data);
        // die();
     
        return [
            'msg' => 'Marquee updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update marquee.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $marquee = Marquee::destroy($id);
        if ($marquee) {
            return $marquee;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete marquee.',
            'status' => 'error'
        ];
    }
}

}