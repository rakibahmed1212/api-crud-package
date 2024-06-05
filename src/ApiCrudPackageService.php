<?php

namespace Rakibahmed\ApiCrudPackage;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class ApiCrudPackageService
{

    /**
     * @param $name
     * This will create controller from stub file
     */
    public static function MakeController($name)
    {
        $controllerTemplate = File::get(__DIR__ . '/stubs/controller.stub');

        $controllerTemplate = Str::replace('{{modelName}}', $name, $controllerTemplate);

        File::put(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    /**
     * @param $name
     * This will create model from stub file
     */
    public static function MakeModel($name)
    {
        $modelTemplate = File::get(__DIR__ . '/stubs/model.stub');

        $modelTemplate = Str::replace('{{modelName}}', $name, $modelTemplate);

        File::put(app_path("/Models/{$name}.php"), $modelTemplate);
    }

    /**
     * @param $name
     * This will create Request from stub file
     */
    public static function MakeRequest($name)
    {
        $requestTemplate = File::get(__DIR__ . '/stubs/request.stub');

        $requestTemplate = Str::replace('{{modelName}}', $name, $requestTemplate);

        if (!file_exists($path = app_path('/Http/Requests/')))
            mkdir($path, 0777, true);

        File::put(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    /**
     * @param $name
     * This will create migration using artisan command
     */
    public static function MakeMigration($name)
    {
        $migrationTemplate = File::get(__DIR__ . '/stubs/migration.stub');

        $migrationTemplate = Str::replace('{{modelName}}', Str::lower(Str::plural($name)), $migrationTemplate);

        File::put(database_path("/migrations/") . date('Y_m_d_His') . '_create_' . Str::lower(Str::plural($name)) . '_table.php', $migrationTemplate);
    }

    /**
     * @param $name
     * This will create route in web.php file
     */
    public static function MakeRoute($name)
    {
        $path_to_file  = base_path('routes/api.php');

        $routesTemplate = 'Route::apiResource(\'' . Str::plural(Str::lower($name)) . "', '{$name}Controller'); \n";
        File::append($path_to_file, $routesTemplate);
    }
}
