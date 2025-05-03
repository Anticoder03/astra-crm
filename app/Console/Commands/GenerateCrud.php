<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateCrud extends Command
{
    protected $signature = 'make:crud {name}';
    protected $description = 'Quickly generate CRUD files including model, controller, request, routes, and blade views';

    public function handle(): void
    {
        $name = Str::studly($this->argument('name'));
        $kebab = Str::kebab(Str::plural($name)); // e.g., blog-posts
        $controller = "{$name}Controller";
        $request = "{$name}Request";

        // Step 1: Create Model + Migration
        $this->call('make:model', ['name' => $name, '--migration' => true]);
        $this->info("Model and migration created: $name");

        // Step 2: Create Resource Controller
        $this->call('make:controller', [
            'name' => $controller,
            '--resource' => true,
            '--model' => $name,
        ]);
        $this->info("Controller created: $controller");

        // Step 3: Create Form Request
        $this->call('make:request', ['name' => $request]);
        $this->info("Request class created: $request");

        // Step 4: Add Route to web.php
        $route = "Route::resource('$kebab', \\App\\Http\\Controllers\\$controller::class);";
        File::append(base_path('routes/web.php'), "\n" . $route);
        $this->info("Route added: $route");

        // Step 5: Create Blade Views
        $viewPath = resource_path("views/{$kebab}");
        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
            $this->info("Created views folder: $viewPath");
        }

        $views = ['index', 'create', 'edit', 'show'];
        foreach ($views as $view) {
            $file = "{$viewPath}/{$view}.blade.php";
            if (!File::exists($file)) {
                File::put($file, "<h1>{$view} view for {$name}</h1>");
                $this->info("Created view file: $file");
            } else {
                $this->info("View already exists: $file");
            }
        }

        $this->info("✅ All done! CRUD for {$name} has been created.");
    }
}
