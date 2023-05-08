<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StateDisasterManagementAuthority;
use App\Http\Services\AboutUs\StateDisasterManagementAuthorityServices;
use Validator;
class StateDisasterManagementAuthorityController extends Controller
{

   public function __construct()
    {
        $this->service = new StateDisasterManagementAuthorityServices();
    }
    public function index()
    {
        try {
            $statedisastermanagementauthority = $this->service->getAll();
            return view('admin.pages.aboutus.state-disaster-management-authority.list-statedisastermanagementauthority', compact('statedisastermanagementauthority'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
}
