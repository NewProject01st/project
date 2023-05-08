<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObjectiveGoals;
use App\Http\Services\AboutUs\ObjectiveGoalsServices;
use Validator;
class ObjectiveGoalsController extends Controller
{

   public function __construct()
    {
        $this->service = new ObjectiveGoalsServices();
    }
    public function index()
    {
        try {
            echo "hiii";
            die();
            // $objectivegoals = $this->service->getAll();
            view('website.pages.aboutus.list-objectivegoals-web');
            // return view('website.pages.aboutus.list-objectivegoals-web', compact('objectivegoals'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
}
