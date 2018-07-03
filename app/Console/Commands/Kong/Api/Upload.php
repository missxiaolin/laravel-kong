<?php

namespace App\Console\Commands\Kong\Api;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Upload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:api:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong api修改';

    public $params = [
        'id' => 'The API id.',
        'name' => 'The API name.',
        'hosts' => 'A comma-separated list of domain names that point to your API. For example: example.com. At least one of hosts, uris, or methods should be specified.',
        'uris' => 'A comma-separated list of URIs prefixes that point to your API. For example: /my-path. At least one of hosts, uris, or methods should be specified.',
        'methods' => 'A comma-separated list of HTTP methods that point to your API. For example: GET,POST. At least one of hosts, uris, or methods should be specified.',
        'upstream_url' => 'The base target URL that points to your API server. This URL will be used for proxying requests. For example: https://example.com.',
        'strip_uri' => 'When matching an API via one of the uris prefixes, strip that matching prefix from the upstream URI to be requested. Default: true.',
        'preserve_host' => 'When matching an API via one of the hosts domain names, make sure the request Host header is forwarded to the upstream service. By default, this is false, and the upstream Host header will be extracted from the configured upstream_url.',
        'retries' => 'The number of retries to execute upon failure to proxy. The default is 5.',
        'upstream_connect_timeout' => 'The timeout in milliseconds for establishing a connection to your upstream service. Defaults to 60000.',
        'upstream_send_timeout' => 'The timeout in milliseconds between two successive write operations for transmitting a request to your upstream service Defaults to 60000.',
        'upstream_read_timeout' => 'The timeout in milliseconds between two successive read operations for transmitting a request to your upstream service Defaults to 60000.',
        'https_only' => 'To be enabled if you wish to only serve an API through HTTPS, on the appropriate port (8443 by default). Default: false.',
        'http_if_terminated' => 'Consider the X-Forwarded-Proto header when enforcing HTTPS only traffic. Default: false.',
    ];

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
        $params = [
            'name' => 'kongTest',
            'hosts' => 'kong.missxiaolin.com',
            "methods" => 'GET,POST',
            "uris" => "/kong/index/kong",
            'upstream_url' => 'http://kong.missxiaolin.com',
        ];
        $id = '579d6bbe-0bc5-499a-a99a-2ef3b0c686c1';

        $client = KongClient::getInstance();
        $res = $client->updateApi($id, $params);
        dump($res);
    }
}
