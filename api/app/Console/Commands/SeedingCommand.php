<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeding:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $controller = new \App\Http\Controllers\Api\WeatherApiController;
        $controller->seeding();
    }
}
