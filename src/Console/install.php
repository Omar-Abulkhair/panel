<?php

namespace Dl\Panel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Log;
class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develogs:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Tables Then Seeding it';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $name = $this->ask('What is your name?');
        Log::info('Log message', array($name => 'db:refresh Command'));
        $this->call('migrate');
        $this->call('db:seed',['--class'=>'Dl\Panel\Database\Seeds\DatabaseSeeder']);
        $this->call('vendor:publish',['--tag'=>'public','--force']);

    }
}
