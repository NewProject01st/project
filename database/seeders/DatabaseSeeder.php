<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesPermissionSeeder::class);
        $this->call(MainMenusSeeder::class);
        $this->call(MainSubMenusSeeder::class);
        $this->call(DynamicPagesSeeder::class);
        $this->call(MarqueeSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(DisasterManagementNewsSeeder::class);
        $this->call(EmergencyContactSeeder::class);
        $this->call(HomeTenderSeeder::class);
        $this->call(GeneralContactSeeder::class);    
        $this->call(DisasterManagementWebPortalSeeder::class);    
        $this->call(DisasterForcastSeeder::class);
        $this->call(WeatherSeeder::class);  
        $this->call(MetaDataSeeder::class);   
        $this->call(PreparednessSeeder::class);    
        $this->call(StateEmergencyOperationsCenterSeeder::class);           
        $this->call(DistrictEmergencyOperationsCenterSeeder::class);           
        $this->call(SearchRescueTeamsSeeder::class);  
        $this->call(ReliefMeasuresResourcesSeeder::class);    
        $this->call(EvacuationPlansSeeder::class);       
        $this->call(PrimaryEmergencyContactNumbersSeeder::class);   
        $this->call(HeaderSeeder::class);   
        $this->call(GalleryCategorySeeder::class);   
        $this->call(DepartmentInfoSeeder::class);   
        $this->call(TrainingEventSeeder::class);   
        $this->call(ResourceCenterDocumentSeeder::class);   
        $this->call(RTISeeder::class);   
        $this->call(VacanciesSeeder::class); 
        $this->call(VideoSeeder::class);     
         $this->call(TrainingMaterialsWorkshopsSeeder::class);            
        $this->call(ResourceCenterSuccessStoriesSeeder::class);  
        $this->call(FooterImportantLinksSeeder::class);   
        $this->call(WebsiteContactSeeder::class);   
        $this->call(IncidentTypeSeeder::class); 
        // $this->call(WebsiteLogoSeeder::class); 
        // $this->call(TollFreeNumberSeeder::class); 
        
        
        
        
    }
}