<?php

namespace Rakibahmed\ApiCrudPackage;


use Illuminate\Console\Command;
use Rakibahmed\ApiCrudPackage\ApiCrudPackageService;

class ApiCrudPackageCommand extends Command
{

    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'make:crud {name : Model (Singular), e.g User, Post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all API Crud operations with a single command';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        
        ApiCrudPackageService::MakeController($name);
        $this->info($name . 'Controller created successfully');
        ApiCrudPackageService::MakeModel($name);
        $this->info($name . ' model created successfully');
        ApiCrudPackageService::MakeRequest($name);
        $this->info($name . 'Request created successfully');
        ApiCrudPackageService::MakeMigration($name);
        $this->info($name . ' migration created successfully');
        ApiCrudPackageService::MakeRoute($name);
        $this->info(strtolower($name) . ' resource route created successfully');
    }
}
