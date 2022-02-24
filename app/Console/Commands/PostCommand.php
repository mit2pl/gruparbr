<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PostCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily post add';

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
    public function handle()
    {
        $getusers = User::all();
        if(isset($getusers)) {
            $change = json_decode($getusers);
            $checkwithuser = array_rand(json_decode($getusers), 1);
            Post::create([
                'title' => 'test',
                'author' => $change[$checkwithuser]->id,
                'content' => 'Post added'
            ]);
        }else {
            Log::info("I cannot add post because user don't exist");
        }
    }
}
