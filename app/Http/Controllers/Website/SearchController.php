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

        $hazardVulnerability = HazardVulnerability::where('is_active',true);
        $hazardVulnerability =  $hazardVulnerability->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($hazardVulnerability)>0) {
            $subMenus = MainSubMenus::where('id',13)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $earlyWarningSystem = EarlyWarningSystem::where('is_active',true);
        $earlyWarningSystem =  $earlyWarningSystem->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($earlyWarningSystem)>0) {
            $subMenus = MainSubMenus::where('id',14)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $capacityTraining = CapacityTraining::where('is_active',true);
        $capacityTraining =  $capacityTraining->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($capacityTraining)>0) {
            $subMenus = MainSubMenus::where('id',15)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $publicAwarenessEducation = PublicAwarenessEducation::where('is_active',true);
        $publicAwarenessEducation =  $publicAwarenessEducation->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($publicAwarenessEducation)>0) {
            $subMenus = MainSubMenus::where('id',16)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $stateEmergencyOperationsCenter = StateEmergencyOperationsCenter::where('is_active',true);
        $stateEmergencyOperationsCenter =  $stateEmergencyOperationsCenter->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($stateEmergencyOperationsCenter)>0) {
            $subMenus = MainSubMenus::where('id',17)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $districtEmergencyOperationsCenter = DistrictEmergencyOperationsCenter::where('is_active',true);
        $districtEmergencyOperationsCenter =  $districtEmergencyOperationsCenter->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($districtEmergencyOperationsCenter)>0) {
            $subMenus = MainSubMenus::where('id',18)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $emergencyContactNumbers = EmergencyContactNumbers::where('is_active',true);
        $emergencyContactNumbers =  $emergencyContactNumbers->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($emergencyContactNumbers)>0) {
            $subMenus = MainSubMenus::where('id',19)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $searchRescueTeams = SearchRescueTeams::where('is_active',true);
        $searchRescueTeams =  $searchRescueTeams->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($searchRescueTeams)>0) {
            $subMenus = MainSubMenus::where('id',20)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $reliefMeasuresResources = ReliefMeasuresResources::where('is_active',true);
        $reliefMeasuresResources =  $reliefMeasuresResources->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($reliefMeasuresResources)>0) {
            $subMenus = MainSubMenus::where('id',21)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $evacuationPlans = EvacuationPlans::where('is_active',true);
        $evacuationPlans =  $evacuationPlans->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($evacuationPlans)>0) {
            $subMenus = MainSubMenus::where('id',22)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $event = Event::where('is_active',true);
        $event =  $event->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('start_date', 'LIKE', '%' . $query . '%')
                                            ->orWhere('end_date', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($event)>0) {
            $subMenus = MainSubMenus::where('id',26)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $event = Event::where('is_active',true);
        $event =  $event->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('start_date', 'LIKE', '%' . $query . '%')
                                            ->orWhere('end_date', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($event)>0) {
            $subMenus = MainSubMenus::where('id',27)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $stateDisasterManagementPlan = StateDisasterManagementPlan::where('is_active',true);
        $stateDisasterManagementPlan =  $stateDisasterManagementPlan->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('policies_year', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($stateDisasterManagementPlan)>0) {
            $subMenus = MainSubMenus::where('id',28)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $districtDisasterManagementPlan = DistrictDisasterManagementPlan::where('is_active',true);
        $districtDisasterManagementPlan =  $districtDisasterManagementPlan->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('policies_year', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($districtDisasterManagementPlan)>0) {
            $subMenus = MainSubMenus::where('id',29)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $stateDisasterManagementPolicy = StateDisasterManagementPolicy::where('is_active',true);
        $stateDisasterManagementPolicy =  $stateDisasterManagementPolicy->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('policies_year', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($stateDisasterManagementPolicy)>0) {
            $subMenus = MainSubMenus::where('id',30)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $relevantLawsRegulation = RelevantLawsRegulation::where('is_active',true);
        $relevantLawsRegulation =  $relevantLawsRegulation->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('policies_year', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($relevantLawsRegulation)>0) {
            $subMenus = MainSubMenus::where('id',31)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $documentspublications = Documentspublications::where('is_active',true);
        $documentspublications =  $documentspublications->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($documentspublications)>0) {
            $subMenus = MainSubMenus::where('id',32)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $mapLatLon = MapLatLon::where('is_active',true);
        $mapLatLon =  $mapLatLon->where(function($query1) use ($query)  {
                                return $query1->where('lat', 'LIKE', '%' . $query . '%')
                                            ->orWhere('lon', 'LIKE', '%' . $query . '%')
                                            ->orWhere('location_name_english', 'LIKE', '%' . $query . '%')
                                            ->orWhere('location_name_marathi', 'LIKE', '%' . $query . '%')
                                            ->orWhere('location_address_english', 'LIKE', '%' . $query . '%')
                                            ->orWhere('location_address_marathi', 'LIKE', '%' . $query . '%')
                                            ->orWhere('data_for', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($mapLatLon)>0) {
            $subMenus = MainSubMenus::where('id',33)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        
        $trainingMaterialsWorkshops = TrainingMaterialsWorkshops::where('is_active',true);
        $trainingMaterialsWorkshops =  $trainingMaterialsWorkshops->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($trainingMaterialsWorkshops)>0) {
            $subMenus = MainSubMenus::where('id',35)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $successStories = SuccessStories::where('is_active',true);
        $successStories =  $successStories->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_designation', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_designation', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($successStories)>0) {
            $subMenus = MainSubMenus::where('id',38)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $disasterForcast = DisasterForcast::where('is_active',true);
        $disasterForcast =  $disasterForcast->where(function($query1) use ($query)  {
                                return $query1->Where('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($disasterForcast)>0) {
            $subMenus = MainSubMenus::where('id',39)->get()->toArray();
            array_push($return_data, $subMenus);
        }

        $websiteContact = WebsiteContact::where('is_active',true);
        $websiteContact =  $websiteContact->where(function($query1) use ($query)  {
                                return $query1->where('english_address', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_address', 'LIKE', '%' . $query . '%')
                                            ->orWhere('email', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_number', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_number', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($websiteContact)>0) {
            $subMenus = MainSubMenus::where('id',40)->get()->toArray();
            array_push($return_data, $subMenus);
        }
        $contact = Contact::where('is_active',true);
        $contact =  $contact->where(function($query1) use ($query)  {
                                return $query1->Where('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($contact)>0) {
            $subMenus = MainSubMenus::where('id',39)->get()->toArray();
            array_push($return_data, $subMenus);
        }


        $vacanciesHeader = VacanciesHeader::where('is_active',true);
        $vacanciesHeader =  $vacanciesHeader->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($vacanciesHeader)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $marquee = Marquee::where('is_active',true);
        $marquee =  $marquee->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($marquee)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $rti = RTI::where('is_active',true);
        $rti =  $rti->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($rti)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $slider = Slider::where('is_active',true);
        $slider =  $slider->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($slider)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $disasterManagementWebPortal = DisasterManagementWebPortal::where('is_active',true);
        $disasterManagementWebPortal =  $disasterManagementWebPortal->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_name', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_name', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_designation', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_designation', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($disasterManagementWebPortal)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $disasterManagementNews = DisasterManagementNews::where('is_active',true);
        $disasterManagementNews =  $disasterManagementNews->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('disaster_date', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($disasterManagementNews)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $departmentInformation = DepartmentInformation::where('is_active',true);
        $departmentInformation =  $departmentInformation->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($departmentInformation)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $emergencyContact = EmergencyContact::where('is_active',true);
        $emergencyContact =  $emergencyContact->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_name', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_name', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_address', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_address', 'LIKE', '%' . $query . '%')
                                            ->orWhere('email', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_number', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_number', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_landline_no', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_landline_no', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($emergencyContact)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

        $PolicyPrivacy = PolicyPrivacy::where('is_active',true);
        $PolicyPrivacy =  $PolicyPrivacy->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($PolicyPrivacy)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }
        $termsCondition = TermsCondition::where('is_active',true);
        $termsCondition =  $termsCondition->where(function($query1) use ($query)  {
                                return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                            ->orWhere('english_description', 'LIKE', '%' . $query . '%')
                                            ->orWhere('marathi_description', 'LIKE', '%' . $query . '%');
                                })->get()->toArray();

        if(count($termsCondition)>0) {

            $return_data_new = array();
            $return_data_n = array();
            $return_data_n['url'] = '/';
            $return_data_n['menu_name_english'] = $query;
            array_push($return_data_new, $return_data_n);
            array_push($return_data, $return_data_new);
        }

    $dynamicWebPages = DynamicWebPages::where('is_active',true);
    $dynamicWebPages =  $dynamicWebPages->where(function($query1) use ($query)  {
                            return $query1->where('english_title', 'LIKE', '%' . $query . '%')
                                        ->orWhere('marathi_title', 'LIKE', '%' . $query . '%')
                                        ->orWhere('publish_date', 'LIKE', '%' . $query . '%');
                            })->get()->toArray();

        if(count($dynamicWebPages)>0) {
            // dd($dynamicWebPages);
            foreach ($dynamicWebPages as $key => $value) {
                $return_data_new = array();
                $return_data_n = array();
                // $return_data_n['url'] = '/new_pro/project/pages/';
                $return_data_n['url'] = "pages/".$value['slug'];
                $return_data_n['menu_name_english'] = $query;
                // $return_data_n['menu_name_english'] = $query;
                array_push($return_data_new, $return_data_n);
                array_push($return_data, $return_data_new);
            }
         
        }
    
// AllWebPages
// 
// CitizenFeedbackSuggestion
// CitizenVolunteerModal
// 
// 
// 
// 
// 
// 
// 
// 
// DynamicWebPages

// 
// 
// ErrorLogs
// 
// 
// FooterImportantLinks
// Gallery
// GalleryCategory
// GeneralContact


// IncidentType
// MainMenus
// MAPGISData
// 
// 
// Metadata
// Permissions
// 
// 
// 
// 
// ReportIncidentCrowdsourcing
// ReportIncidentModal
// Roles
// RolesPermissions
// 
// 
// 
// SocialIcon
// 
// 
// 
// 
// TblArea
// 
// Tollfree
// 
// TweeterFeed
// User
// 
// Video
// VolunteerCitizenSupport
// Weather
// 
// WebsiteLogo
// WheatherForecast
// info('$return_data');
// info($return_data);
info($return_data);
        return response()->json($return_data);
    }
}