<?php
namespace App\Http\Repository\Website\ResearchCenter;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	Documentspublications

};

class ResearchCenterRepository  {


	public function getAllDocumentspublications()
    {
        try {
            $data_output = Documentspublications::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('marathi_title', 'marathi_description','marathi_pdf');
            } else {
                $data_output = $data_output->select('english_title', 'english_description','english_pdf');
            }
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        //    echo $data_output;
        //    die();
        } catch (\Exception $e) {
            return $e;
        }
    }
  
    
}