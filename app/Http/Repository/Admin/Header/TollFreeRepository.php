<?php
namespace App\Http\Repository\Admin\Header;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Tollfree
};

class TollFreeRepository{
	public function getAll()
    {
        try {
            return Tollfree::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $tollfree_no = new Tollfree();
        $tollfree_no->english_tollfree_no = $request['english_tollfree_no'];
        $tollfree_no->marathi_tollfree_no = $request['marathi_tollfree_no'];
        $tollfree_no->save();       
              
		return $tollfree_no;

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
        $tollfree_no = Tollfree::find($id);
        if ($tollfree_no) {
            return $tollfree_no;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get tollfree number.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $tollfree_no = Tollfree::find($request->id);
        
        if (!$tollfree_no) {
            return [
                'msg' => 'Tollfree number not found.',
                'status' => 'error'
            ];
        }
      
        $tollfree_no->english_tollfree_no = $request['english_tollfree_no'];
        $tollfree_no->marathi_tollfree_no = $request['marathi_tollfree_no'];
     
        $tollfree_no->save();       
                   
        return [
            'msg' => 'Tollfree number updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Tollfree number.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $tollfree_no = Tollfree::find($id);
        if ($tollfree_no) {  
            $tollfree_no->delete();
            
            return $tollfree_no;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}