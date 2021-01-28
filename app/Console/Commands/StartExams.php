<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\ExamPortal\ExamHelper;

class StartExams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exams:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets is_active flag to 1 for all exams that are active';

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
     * @return int
     */
    public function handle( ExamHelper $helper )
    {
        $helper->checkExamsStarted();
        return 0;
    }
}
