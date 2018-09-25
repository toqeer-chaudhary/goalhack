<?php

namespace App\Console\Commands;

use App\Models\GoalData;
use Illuminate\Console\Command;

class ApproveDataRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'approve:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pending Goal Datas are approved successfully';

    /**
     * The drip e-mail service.
     *
     * @var GoalData
     */
    protected $goalData;

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct(GoalData $goalData)
    {
        parent::__construct();
        $this->goalData = $goalData;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $allGoalDatas = $this->goalData::all()
           ->where("is_approved","=",0)
           ->where("actual_data","!=",0);
       foreach ($allGoalDatas as $goalData)
       {
           $goalData->is_approved = 1;
           $goalData->update();
       }
       // message to displayed
        $this->info('Pending Goal Datas are approved successfully');
    }
}
