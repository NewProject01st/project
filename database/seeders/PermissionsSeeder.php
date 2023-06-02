<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Permissions::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'route_name' => 'Main Menu',
                'url' => 'list-main-menu',
                'permission_name' => 'Main Menu List',
            ]);

            Permissions::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'route_name' => 'Sub Menu',
                'url' => 'list-sub-menu',
                'permission_name' => 'Sub Menu List',
            ]);

            Permissions::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'route_name' => 'News Bar',
                    'url' => '/list-marquee',
                    'permission_name' => 'News Bar',
                ]);

                
            Permissions::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'route_name' => 'Slider',
                    'url' => '/list-slide',
                    'permission_name' => 'Slider',
                ]);
                Permissions::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'route_name' => 'Disaster Web Portal',
                    'url' => '/list-disaster-management-web-portal',
                    'permission_name' => 'Disaster Web Portal',
                ]);

                Permissions::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'route_name' => 'Disaster Management News',
                        'url' => 'list-disaster-management-news',
                        'permission_name' => 'Disaster Management News',
                    ]);

                Permissions::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'route_name' => 'Weather',
                        'url' => 'list-weather',
                        'permission_name' => 'Weather',
                    ]);

                Permissions::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'route_name' => 'Disaster Forcast',
                        'url' => 'list-disasterforcast',
                        'permission_name' => 'Disaster Forcast',
                    ]);

                    Permissions::create(
                        [
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                            'route_name' => 'Disaster Management Portal',
                            'url' => 'list-disastermanagementportal',
                            'permission_name' => 'Disaster Management Portal',
                        ]);

                        Permissions::create(
                            [
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'route_name' => 'Objective Goals',
                                'url' => 'list-objectivegoals',
                                'permission_name' => 'Objective Goals',
                            ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'State Disaster Management Authority',
                                    'url' => 'list-statedisastermanagementauthority',
                                    'permission_name' => 'State Disaster Management Authority',
                                ]);
                                Permissions::create(
                                    [
                                        'created_at' => \Carbon\Carbon::now(),
                                        'updated_at' => \Carbon\Carbon::now(),
                                        'route_name' => 'Dynamic Pages',
                                        'url' => 'list-dynamic-page',
                                        'permission_name' => 'Dynamic Pages',
                                    ]);

                        Permissions::create(
                            [
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'route_name' => 'Hazard and Vulnerability',
                                'url' => 'list-hazard-vulnerability-assessment',
                                'permission_name' => 'Hazard and Vulnerability',
                            ]);
                        Permissions::create(
                            [
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'route_name' => 'Early Warning System',
                                'url' => 'list-early-warning-system',
                                'permission_name' => 'Early Warning System',
                            ]);
                        Permissions::create(
                            [
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'route_name' => 'Capacity training',
                                'url' => 'list-capacity-building-and-training',
                                'permission_name' => 'Capacity training',
                            ]);   
                            
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Awareness And Education',
                                    'url' => 'list-public-awareness-and-education',
                                    'permission_name' => 'Awareness And Education',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'State Emergency Operations Center (EOC)',
                                    'url' => 'list-state-emergency-operations-center',
                                    'permission_name' => 'State Emergency Operations Center (EOC)',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'District Emergency Operations Center (DEOC)',
                                    'url' => 'list-district-emergency-operations-center',
                                    'permission_name' => 'District Emergency Operations Center (DEOC)',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Emergency Contact Numbers',
                                    'url' => 'list-emergency-contact-numbers',
                                    'permission_name' => 'Emergency Contact Numbers',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Evacuation Plans',
                                    'url' => 'list-evacuation-plans',
                                    'permission_name' => 'Evacuation Plans',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Relief Measures Resources',
                                    'url' => 'list-relief-measures-resources',
                                    'permission_name' => 'Relief Measures Resources',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Search Rescue Teams',
                                    'url' => 'list-search-rescue-teams',
                                    'permission_name' => 'Search Rescue Teams',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Report Incident Crowdsourcing',
                                    'url' => 'list-report-crowdsourcing',
                                    'permission_name' => 'Report Incident Crowdsourcing',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Volunteer Citizen Support',
                                    'url' => 'list-volunteer-citizen-support',
                                    'permission_name' => 'Volunteer Citizen Support',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Feedback and suggestions',
                                    'url' => 'list-citizen-feedback-and-suggestion',
                                    'permission_name' => 'Feedback and suggestions',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'State Disaster Management Plan',
                                    'url' => 'list-state-disaster-management-plan',
                                    'permission_name' => 'State Disaster Management Plan',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'District Disaster Management Plan',
                                    'url' => 'list-district-disaster-management-plan',
                                    'permission_name' => 'District Disaster Management Plan',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'State Disaster Management Policy',
                                    'url' => 'list-state-disaster-management-policy',
                                    'permission_name' => 'State Disaster Management Policy',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Relevant-Laws-And-Regulations',
                                    'url' => 'list-relevant-laws-and-regulations',
                                    'permission_name' => 'Relevant-Laws-And-Regulations',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Documents And Publications',
                                    'url' => 'list-document-publications',
                                    'permission_name' => 'Documents And Publications',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Event',
                                    'url' => 'list-event',
                                    'permission_name' => 'Event',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Tender',
                                    'url' => 'list-tenders',
                                    'permission_name' => 'Tender',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Policies & Acts',
                                    'url' => 'list-policiesacts',
                                    'permission_name' => 'Policies & Acts',
                                ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Projects',
                                    'url' => 'list-projects',
                                    'permission_name' => 'Projects',
                                ]);
                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Metadata',
                                    'url' => 'list-metadata',
                                    'permission_name' => 'Metadata',
                                ]);

                                    

        


            
    }
}
