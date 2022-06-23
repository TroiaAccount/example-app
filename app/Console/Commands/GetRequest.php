<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = "/getApplications";
        $headres = ['Cookie: JSESSIONID=E43F10D570CF94A0F3661F4C646161F2'];
        $ch = curl_init("http://89.22.229.228:5080/rest$url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headres);
        $response = curl_exec($ch);
        dd($response);
        return 0;
    }
}
