<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementPortal;
use App\Http\Services\AboutUs\DisasterManagementPortalServices;
use Validator;
class DisasterManagementPortalController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementPortalServices();
    }
    public function index()
    {
        try {
            $disastermanagementportal = $this->service->getAll();
            return view('admin.pages.aboutus.disaster-management-portal.list-disastermanagementportal', compact('disastermanagementportal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    
}
