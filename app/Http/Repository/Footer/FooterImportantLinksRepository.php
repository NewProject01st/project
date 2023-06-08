<?php
namespace App\Http\Repository\Footer;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	FooterImportantLinks
};

class FooterImportantLinksRepository  {
	public function getAll()
    {
        try {
            return FooterImportantLinks::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function add($request)
{
    try {
        $link_data = new FooterImportantLinks();
        $link_data->english_title = $request['english_title'];
        $link_data->marathi_title = $request['marathi_title'];
        $link_data->url = $request['url'];
        $link_data->save();       
     
		return $link_data;
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
        $link = FooterImportantLinks::find($id);
        if ($link) {
            return $link;
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
        $link_data = FooterImportantLinks::find($request->id);
        $link_data->english_title = $request['english_title'];
        $link_data->marathi_title = $request['marathi_title'];
        $link_data->url = $request['url'];

       
        $link_data->update();  
        
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
public function updateOne($request)
{
    try {
        $links = FooterImportantLinks::find($request); // Assuming $request directly contains the ID        
        if ($links) {
            $is_active = $links->is_active === 1 ? 0 : 1;
            $links->is_active = $is_active;
            // dd($marquee);
            $links->save();

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
        $link = FooterImportantLinks::destroy($id);
        if ($link) {
            return $link;
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