<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CommentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CommentCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add "yes" comment to random post';

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
            $changeusertojson = json_decode($getusers);
            $checkwithuser = array_rand($changeusertojson, 1);
            $getposts = Post::all();
            if(isset($getposts))
            {
                $changeposttojson = json_decode($getposts);
                $checkwithpost = array_rand($changeposttojson, 1);
                Comment::create([
                    'post_id' => $changeposttojson[$checkwithpost]->id,
                    'content' => 'tak',
                    'author' => $changeusertojson[$checkwithuser]->id
                ]);
            } else {
                Log::info("I cannot add comment because post don't exist");
            }
        }else {
            Log::info("I cannot add comment because user don't exist");
        }
    }
}
