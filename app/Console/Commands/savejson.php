<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class savejson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Storage::disk('local')->put('news.json', json_encode(
            News::$news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        Storage::disk('local')->put('categories.json', json_encode(
            News::$categories, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
