<?php

namespace App\Jobs;

use App\Models\Url;
use App\Models\BaseDomain;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function handle()
    {
        $url = trim($this->url);

        if (empty($url)) {
            return;
        }

        if (Url::where('url', $url)->exists()) {
            return;
        }

        $baseDomain = parse_url($url, PHP_URL_HOST);

        $baseDomainModel = BaseDomain::firstOrCreate(['domain_name' => $baseDomain]);

        Url::create([
            'url' => $url,
            'base_domain_id' => $baseDomainModel->id,
        ]);
    }
}
