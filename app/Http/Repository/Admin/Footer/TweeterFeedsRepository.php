<?php
namespace App\Http\Repository\Admin\Footer;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	TweeterFeed
};

class TweeterFeedsRepository  {
	public function getAll()
    {
        try {
            return TweeterFeed::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function add($request)
{
    try {
        $tweeter_data = new TweeterFeed();
        $tweeter_data->url = $request['url'];
        $tweeter_data->save();       
     
		return $tweeter_data;
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
        $tweeter = TweeterFeed::find($id);
        if ($tweeter) {
            return $tweeter;
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
public function update($request)
{
    try {
        $tweeter_data = TweeterFeed::find($request->id);
        $tweeter_data->url = $request['url'];
       
        $tweeter_data->update();  
        //    dd($tweeter_data);  
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
public function updateOne($request)
{
    try {
        $tweeter = TweeterFeed::find($request); // Assuming $request directly contains the ID        
        if ($tweeter) {
            $is_active = $tweeter->is_active === 1 ? 0 : 1;
            $tweeter->is_active = $is_active;
            $tweeter->save();

            return [
                'msg' => 'Marquee updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Marquee not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $tweeter = TweeterFeed::destroy($id);
        if ($tweeter) {
            return $tweeter;
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