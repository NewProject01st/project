<?php

namespace App\Http\Controllers\Website\ResearchCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\ResearchCenter\ResearchCenterServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class ResearchCenterController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new ResearchCenterServices();
        $this->menu = getMenuItems();
        $this->socialicon = getSocialIcon();

       
    }
    public function changeLanguage(Request $request) {
        Session::put('language', $request->language);
    }  


    public function getAllDocumentspublications()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllDocumentspublications();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-documents-publications-web',compact('language','menu','socialicon', 'data_output'));
    }  
    public function getAllMapsGISData()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            // $data_output = $this->service->getAllDocumentspublications();
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-maps-gis-data-web',compact('language','menu','socialicon'));
    }  


    public function getAllTraningMaterial()
    {
        try {

            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_output = $this->service->getAllTrainingMaterial();
            
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-training-materials-workshops-web',compact('language','menu','socialicon','data_output'));
    }  

    // public function getAllMultimedia()
    // {
    //     try {

    //         $menu = $this->menu;
    //         $socialicon = $this->socialicon;
    //         $data_getallvideo = $this->service->getAllVideo();
    //         $data_output = $this->service->getAllGallery();
    //         // dd($data_output);
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.research-center.list-multimedia-web',compact('language','menu','socialicon', 'data_getallvideo', 'data_output'));
    // }  


    public function getAllMultimedia(Request $request)
    {
        try {
            $menu = $this->menu;
            $socialicon = $this->socialicon;
            $data_getallvideo = $this->service->getAllVideo();
            $galleryData = $this->service->getAllGallery($request);
            $gallery_data = $galleryData['gallery_data'];
            $categories = $galleryData['categories'];
            if (Session::get('language') == 'mar') {
                $language = Session::get('language');
            } else {
                $language = 'en';
            }

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.research-center.list-multimedia-web',compact('language', 'menu', 'socialicon', 'gallery_data','data_getallvideo', 'categories'));
    }

    // public function getAllMultimedia()
    // {
    //     try {
    //         $menu = $this->menu;
    //         $socialicon = $this->socialicon;
    //         $galleryData = $this->service->getAllGallery();
    //         $data_output_new =  $galleryData['data_output'];
    //         $categories = $galleryData['data_output_array'];
    //         // dd($galleryData);
    //         if ($galleryData instanceof \Exception) {
    //             throw $galleryData; // Rethrow the exception
    //         }
    
    //         $data_output = $galleryData['data_output'];
    //         $categories = $galleryData['categories'];
   
    //         if (Session::get('language') == 'mar') {
    //             $language = Session::get('language');
    //         } else {
    //             $language = 'en';
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.research-center.list-multimedia-web', compact('language', 'menu', 'socialicon', 'data_output', 'categories'));
    // }
     
    
}
