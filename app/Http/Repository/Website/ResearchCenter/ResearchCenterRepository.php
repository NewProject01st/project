<?php
namespace App\Http\Repository\Website\ResearchCenter;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
	Documentspublications,
    Video,
    Gallery,
    GalleryCategory,
    TrainingMaterialsWorkshops
    

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
    public function getAllVideo()
    {
        try {
            $data_output = Video::where('is_active','=',true);
            if (Session::get('language') == 'mar') {
                $data_output =  $data_output->select('video_name');
            } else {
                $data_output =  $data_output->select('video_name');
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
    
    // public function getAllGallery()
    // {
    //     try {
    //         $categories = array_unique(array_column($data_output, 'category'));

    //         $data_output = Gallery::where('is_active','=',true);
    //         if (Session::get('language') == 'mar') {
    //             $data_output =  $data_output->select('category_id','marathi_image');
    //         } else {
    //             $data_output = $data_output->select('category_id','english_image');
    //         }
    //         $data_output =  $data_output->get()
    //                         ->toArray();
    //         return  $data_output;
    //     //    echo $data_output;
    //     //    die();
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

public function getAllGallery()
{
    try {
        $query = Gallery::where('is_active', true);

        if (Session::get('language') == 'mar') {
            $query->select('category_id', 'marathi_image');
        } else {
            $query->select('category_id', 'english_image');
        }

        $data_output = $query->get()->toArray();

        // Extract unique categories from data_output
        $categories = array_unique(array_column($data_output, 'category_id'));

        return [
            'data_output' => $data_output,
            'categories' => $categories
        ];
    } catch (\Exception $e) {
        return $e;
    }
}

// public function getAllGallery()
// {
//     try {
//         $data_output = Gallery::where('is_active','=',true);
//         $categories = GalleryCategory::where('is_active','=',true);
//         if (Session::get('language') == 'mar') {
//             $data_output_new =  $data_output->select('category_id', 'marathi_image');
//             $categories_new= $categories->select('marathi_name');
//         } else {
//             $data_output_new = $data_output->select('category_id', 'english_image');
//             $categories_new = $categories->select('english_name');
//         }
//         $data_output_final = $data_output_new->get()->toArray();
//         $categories_final = $categories_new->get()->toArray();
//         // dd($data_output_final);
//         return ['data_output_final' => $data_output_final, 'categories_final' => $categories_final];
//     } catch (\Exception $e) {
//         return $e;
//     }
// }

public function getAllTrainingMaterial()
{
    try {
        $data_output = TrainingMaterialsWorkshops::where('is_active','=',true);
        if (Session::get('language') == 'mar') {
            $data_output =  $data_output->select('marathi_title', 'marathi_pdf');
        } else {
            $data_output = $data_output->select('english_title', 'english_pdf');
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