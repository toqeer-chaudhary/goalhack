<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\InvoiceController;

class GenerateInvoice extends Command
{
    private $_Invoice;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate invoice for all subscribed customers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(InvoiceController $invoiceController)
    {
        parent::__construct();
        $this->_Invoice = $invoiceController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->_Invoice->generateInvoice();
        $this->info('Invoices Successfully generated!');
    }
}
