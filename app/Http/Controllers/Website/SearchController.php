<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ { 
AllWebPages,
CapacityTraining,
CitizenFeedbackSuggestion,
CitizenVolunteerModal,
Contact,
DepartmentInformation,
DisasterForcast,
DisasterManagementNews,
DisasterManagementPortal,
DisasterManagementWebPortal,
DistrictDisasterManagementPlan,
DistrictEmergencyOperationsCenter,
Documentspublications,
DynamicWebPages,
EarlyWarningSystem,
EmergencyContact,
EmergencyContactNumbers,
ErrorLogs,
EvacuationPlans,
Event,
FooterImportantLinks,
Gallery,
GalleryCategory,
GeneralContact,
HazardVulnerability,
HomeTender,
IncidentType,
MainMenus,
MainSubMenus,
MAPGISData,
MapLatLon,
Marquee,
Metadata,
ObjectiveGoals,
Permissions,
PolicyPrivacy,
PublicAwarenessEducation,
RelevantLawsRegulation,
ReliefMeasuresResources,
ReportIncidentCrowdsourcing,
ReportIncidentModal,
Roles,
RolesPermissions,
RTI,
SearchRescueTeams,
Slider,
SocialIcon,
StateDisasterManagementAuthority,
StateDisasterManagementPlan,
StateDisasterManagementPolicy,
StateEmergencyOperationsCenter,
SuccessStories,
TblArea,
TermsCondition,
Tollfree,
TrainingMaterialsWorkshops,
TweeterFeed,
User,
VacanciesHeader,
Video,
VolunteerCitizenSupport,
Weather,
WebsiteContact,
WebsiteLogo,
WheatherForecast

};
use Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $return_data = array();
        $query = $request->input('query');

        $disasterManagementPortal = DisasterManagementPortal::where('is_active',true);
        $disasterManagementPortal =  $disasterManagementPortal->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($disasterManagementPortal)>0) {
            $subMenus = MainSubMenus::where('id',1)->get()->toArray();
            array_push($return_data, $subMenus);
        }


        $objectiveGoals = ObjectiveGoals::where('is_active',true);
        $objectiveGoals =  $objectiveGoals->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($objectiveGoals)>0) {
            $subMenus = MainSubMenus::where('id',2)->get()->toArray();
            array_push($return_data, $subMenus);
        }


        $stateDisasterManagementAuthority = StateDisasterManagementAuthority::where('is_active',true);
        $stateDisasterManagementAuthority =  $stateDisasterManagementAuthority->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($stateDisasterManagementAuthority)>0) {
            $subMenus = MainSubMenus::where('id',3)->get()->toArray();
            array_push($return_data, $subMenus);
        }
// AllWebPages
// CapacityTraining
// CitizenFeedbackSuggestion
// CitizenVolunteerModal
// Contact
// DepartmentInformation
// DisasterForcast
// DisasterManagementNews
// DisasterManagementWebPortal
// DistrictDisasterManagementPlan
// DistrictEmergencyOperationsCenter
// Documentspublications
// DynamicWebPages
// EarlyWarningSystem
// EmergencyContact
// EmergencyContactNumbers
// ErrorLogs
// EvacuationPlans
// Event
// FooterImportantLinks
// Gallery
// GalleryCategory
// GeneralContact
// HazardVulnerability
// HomeTender
// IncidentType
// MainMenus
// MAPGISData
// MapLatLon
// Marquee
// Metadata
// Permissions
// PolicyPrivacy
// PublicAwarenessEducation
// RelevantLawsRegulation
// ReliefMeasuresResources
// ReportIncidentCrowdsourcing
// ReportIncidentModal
// Roles
// RolesPermissions
// RTI
// SearchRescueTeams
// Slider
// SocialIcon
// StateDisasterManagementPlan
// StateDisasterManagementPolicy
// StateEmergencyOperationsCenter
// SuccessStories
// TblArea
// TermsCondition
// Tollfree
// TrainingMaterialsWorkshops
// TweeterFeed
// User
// VacanciesHeader
// Video
// VolunteerCitizenSupport
// Weather
// WebsiteContact
// WebsiteLogo
// WheatherForecast
// info('$return_data');
// info($return_data);
        return response()->json($return_data);
    }
}