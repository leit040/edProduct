<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class getRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get currency rates';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
        foreach ($response->json()as $item=>$value) {
            DB::table('exchange_rates')->upsert(['cc' => $value['cc'], 'txt' => $value['txt'], 'rate' => $value['rate']],['cc','txt'],['rate']);
        }
        return 0;
    }

}
