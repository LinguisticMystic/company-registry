<?php

namespace App\Console\Commands;

use App\Services\ImportCompanyDataService;
use Illuminate\Console\Command;

class ImportCompanyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'companies:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import company data from data.gov.lv';
    private ImportCompanyDataService $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImportCompanyDataService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->service->execute();

        return 0;
    }
}
