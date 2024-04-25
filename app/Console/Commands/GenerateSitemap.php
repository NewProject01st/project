<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\URL; // Add this line
class GenerateSitemap extends Command
{

   
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml for the website';

    public function handle()
    {
        $baseURL = 'https://nmcdm.org.in/'; // Define the base URL


        $routes = \Route::getRoutes()->getRoutes();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($routes as $route) {
            $uri = $route->uri();
            if ($uri != '/') {
                $xml .= '<url>';
                // $xml .= '<loc>' . URL::to($uri) . '</loc>';
                $xml .= '<loc>' . $baseURL . ltrim($uri, '/') . '</loc>'; // Concatenate base URL with URI
                $xml .= '<priority>1.0</priority>'; // Set priority to "high"
                $xml .= '</url>';
            }
        }

        $xml .= '</urlset>';

        file_put_contents(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully.');
    }


    // /**
    //  * The name and signature of the console command.
    //  *
    //  * @var string
    //  */
    // protected $signature = 'command:name';

    // /**
    //  * The console command description.
    //  *
    //  * @var string
    //  */
    // protected $description = 'Command description';

    // /**
    //  * Create a new command instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    // /**
    //  * Execute the console command.
    //  *
    //  * @return int
    //  */
    // public function handle()
    // {
    //     return 0;
    // }
}
