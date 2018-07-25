<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/3
 * Time: 下午4:40
 */

return [
    'rate-limiting' => [
        'id' => 'When update the plugin,the argument is required.',
        'name' => 'The name of the plugin to use, in this case rate-limiting',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'consumer_id' => 'The id of the Consumer which this plugin will target.',
        'config.second' => 'The amount of HTTP requests the developer can make per second. At least one limit must exist.',
        'config.minute' => 'The amount of HTTP requests the developer can make per minute. At least one limit must exist.',
        'config.hour' => 'The amount of HTTP requests the developer can make per hour. At least one limit must exist.',
        'config.day' => 'The amount of HTTP requests the developer can make per day. At least one limit must exist.',
        'config.month' => 'The amount of HTTP requests the developer can make per month. At least one limit must exist.',
        'config.year' => 'The amount of HTTP requests the developer can make per year. At least one limit must exist.',
        'config.limit_by' => 'The entity that will be used when aggregating the limits: consumer, credential, ip. If the consumer or the credential cannot be determined, the system will always fallback to ip.',
        'config.policy' => 'The rate-limiting policies to use for retrieving and incrementing the limits. Available values are local (counters will be stored locally in-memory on the node), cluster (counters are stored in the datastore and shared across the nodes) and redis (counters are stored on a Redis server and will be shared across the nodes).',
        'config.fault_tolerant' => 'A boolean value that determines if the requests should be proxied even if Kong has troubles connecting a third-party datastore. If true requests will be proxied anyways effectively disabling the rate-limiting function until the datastore is working again. If false then the clients will see 500 errors.',
        'config.hide_client_headers' => 'Optionally hide informative response headers.',
        'config.redis_host' => 'When using the redis policy, this property specifies the address to the Redis server.',
        'config.redis_port' => 'When using the redis policy, this property specifies the port of the Redis server. By default is 6379.',
        'config.redis_password' => 'When using the redis policy, this property specifies the password to connect to the Redis server.',
        'config.redis_timeout' => 'When using the redis policy, this property specifies the timeout in milliseconds of any command submitted to the Redis server.',
        'config.redis_database' => 'When using the redis policy, this property specifies Redis database to use.',
    ],
    'file-log' => [
        'id' => 'When update the plugin,the argument is required.',
        'name' => 'The name of the plugin to use, in this case file-log',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'consumer_id' => 'The id of the Consumer which this plugin will target.',
        'config.path' => 'The file path of the output log file. The plugin will create the file if it doesn\'t exist yet. Make sure Kong has write permissions to this file.',
        'config.reopen' => 'Introduced in Kong 0.10.2. Determines whether the log file is closed and reopened on every request. If the file is not reopened, and has been removed/rotated, the plugin will keep writing to the stale file descriptor, and hence lose information.',
    ],
    'basic-auth' => [
        'id' => 'When update the plugin,the argument is required.',
        'name' => 'The name of the plugin to use, in this case basic-auth',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'config.hide_credentials' => 'An optional boolean value telling the plugin to show or hide the credential from the upstream service. If true, the plugin will strip the credential from the request (i.e. the Authorization header) before proxying it.',
        'config.anonymous' => 'An optional string (consumer uuid) value to use as an "anonymous" consumer if authentication fails. If empty (default), the request will fail with an authentication failure 4xx. Please note that this value must refer to the Consumer id attribute which is internal to Kong, and not its custom_id.',
    ],
    'ip-restriction' => [
        'id' => 'When update the plugin,the argument is required.',
        'name' => 'The name of the plugin to use, in this case ip-restriction',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'consumer_id' => 'The id of the Consumer which this plugin will target.',
        'config.whitelist' => 'Comma separated list of IPs or CIDR ranges to whitelist. One of config.whitelist or config.blacklist must be specified.',
        'config.blacklist' => 'Comma separated list of IPs or CIDR ranges to blacklist. One of config.whitelist or config.blacklist must be specified.',
    ],
    'cors' => [
        'id' => 'When update the plugin,the argument is required.',
        'name' => 'The name of the plugin to use, in this case cors',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'config.origins' => 'A comma-separated list of allowed domains for the Access-Control-Allow-Origin header. If you wish to allow all origins, add * as a single value to this configuration field. The accepted values can either be flat strings or PCRE regexes. NOTE: Prior to Kong 0.10.x, this parameter was config.origin (note the change in trailing s), and only accepted a single value, or the * special value.',
        'config.methods' => 'Value for the Access-Control-Allow-Methods header, expects a comma delimited string (e.g. GET,POST).',
        'config.headers' => 'Value for the Access-Control-Allow-Headers header, expects a comma delimited string (e.g. Origin, Authorization).',
        'config.exposed_headers' => 'Value for the Access-Control-Expose-Headers header, expects a comma delimited string (e.g. Origin, Authorization). If not specified, no custom headers are exposed.',
        'config.credentials' => 'Flag to determine whether the Access-Control-Allow-Credentials header should be sent with true as the value.',
        'config.max_age' => 'Indicated how long the results of the preflight request can be cached, in seconds.',
        'config.preflight_continue' => 'A boolean value that instructs the plugin to proxy the OPTIONS preflight request to the upstream service.',
    ],
];