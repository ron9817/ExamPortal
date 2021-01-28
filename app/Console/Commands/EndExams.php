<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\ExamPortal\ExamHelper;

class EndExams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exams:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exam that are ended are maked in active and unpublished, all un submitted exams are submitted and scores are calculated, all users are emailed with their score';

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
        $helper->checkExamsEnded();
        return 0;
    }
}
