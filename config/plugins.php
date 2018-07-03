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
];