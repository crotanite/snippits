<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class GenerateCodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an invite code.';

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
        $user = User::where('email', '=', config('app.initial_user.email'))->first();
        $code = Str::random(15);

        Invite::create(['code' => $code, 'user_id' => $user->id]);

        $this->info("Generated Code: {$code}");
    }
}
