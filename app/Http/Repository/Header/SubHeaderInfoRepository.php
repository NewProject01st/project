<?php
namespace App\Http\Repository\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	SubHeaderInfo
};

class SubHeaderInfoRepository{
	public function getAll()
    {
        try {
            return SubHeaderInfo::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->logo->extension();
        
        $request->logo->storeAs('public/images/header/sub-header', $englishImageName);
        
        $sub_header_info = new SubHeaderInfo();
        $sub_header_info->logo = $englishImageName;
        // $sub_header_info->english_tollfree_title = $request['english_tollfree_title'];
        // $sub_header_info->marathi_tollfree_title = $request['marathi_tollfree_title'];
        $sub_header_info->english_tollfree_no = $request['english_tollfree_no'];
        $sub_header_info->marathi_tollfree_no = $request['marathi_tollfree_no'];
        $sub_header_info->english_city = $request['english_city'];
        $sub_header_info->marathi_city = $request['marathi_city'];

        $sub_header_info->save();       
              
		return $sub_header_info;

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
        $subheader_info = SubHeaderInfo::find($id);
        if ($subheader_info) {
            return $subheader_info;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id social icon.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $subheader_info = SubHeaderInfo::find($request->id);
        
        if (!$subheader_info) {
            return [
                'msg' => 'social icon not found.',
                'status' => 'error'
            ];
        }
         // Delete existing files
         Storage::delete([
            'public/images/header/sub-header/' . $subheader_info->logo,
        ]);
        
        $englishImageName = time() . '_english.' . $request->logo->extension();
        
        $request->logo->storeAs('public/images/header/sub-header', $englishImageName);
        
        $sub_header_info = new SubHeaderInfo();
        $sub_header_info->logo = $englishImageName;
        // $sub_header_info->english_tollfree_title = $request['english_tollfree_title'];
        // $sub_header_info->marathi_tollfree_title = $request['marathi_tollfree_title'];
        $sub_header_info->english_tollfree_no = $request['english_tollfree_no'];
        $sub_header_info->marathi_tollfree_no = $request['marathi_tollfree_no'];
        $sub_header_info->english_city = $request['english_city'];
        $sub_header_info->marathi_city = $request['marathi_city'];


        $subheader_info->save();       
                   
        return [
            'msg' => 'social icon updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update social icon.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $subheader_info = SubHeaderInfo::find($id);
        if ($subheader_info) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/header/sub-header/'.$subheader_info->logo,
            ]);

            // Delete the record from the database
            
            $subheader_info->delete();
            
            return $subheader_info;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}