<?php

namespace App\Console\Commands;

use App\Helpers\Reddit;
use Illuminate\Console\Command;

class GetRedditSubmissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reddit:submissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull in reddit submissions from subreddits';

    private $reddit;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->reddit = new Reddit();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->reddit->getSubredditListings('pbbg');
    }
}
