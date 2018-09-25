<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CompanyController;

class LicienseExpire extends Command
{
    private $company;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'liciense:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CompanyController $companyController)
    {
        parent::__construct();
        $this->company = $companyController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->company->expireLiciense();
        $this->info('Company Successfully Expired!');
    }
}
