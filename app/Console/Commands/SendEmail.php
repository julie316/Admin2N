<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DossierMail;
use Carbon\Carbon;
use App\Dossier;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendEmail:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is sending mail automatically to users';

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
        $dates = Dossier::select('date_expire')->get();
        
        foreach ($dates as $date) {
            $date_fetch = $date['date_expire'];
            $date_rappel = new Carbon($date_fetch);
            $date_rappel->subWeeks(1);
            $date_rappel->toDateString();

            if ($date_rappel->isCurrentDay()) {
                $query = Dossier::where('date_expire', $date_fetch)->get();
                foreach (['julieeboa7@gmail.com', 'vanisfeutio6@gmail.com', 'madjiali2@gmail.com'] as $adresse) {
                    Mail::to($adresse)->send(new DossierMail($query));
                }
               
            }
        }
    }
}
