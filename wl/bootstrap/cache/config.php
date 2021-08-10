<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url_base' => 'whitelable.wx.agency/wl/',
    'url' => 'http://whitelable.wx.agency/wl/',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:Rx+15Nh5g6jWNYxBBqrw0oFjQwwsUDoCbxE9tg8sNes=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Intervention\\Image\\ImageServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
    'invalid_subdomains' => 
    array (
      0 => 'admin',
      1 => 'administrator',
      2 => 'api',
      3 => 'app',
      4 => 'controlpanel',
      5 => 'cp',
      6 => 'custom_domain',
      7 => 'custom_subdomain',
      8 => 'dns',
      9 => 'facebook',
      10 => 'hooks',
      11 => 'hostmaster',
      12 => 'linkedin',
      13 => 'mail',
      14 => 'microsoft',
      15 => 'node',
      16 => 'nodestatus',
      17 => 'ns',
      18 => 'pagestatus',
      19 => 'panel',
      20 => 'pinterest',
      21 => 'point',
      22 => 'pointdns',
      23 => 'root',
      24 => 'self',
      25 => 'service',
      26 => 'servicestatus',
      27 => 'sitestatus',
      28 => 'staging',
      29 => 'test',
      30 => 'twitter',
      31 => 'update',
      32 => 'updates',
      33 => 'webadmin',
      34 => 'webhooks',
      35 => 'webmail',
      36 => 'webmaster',
      37 => 'webnode',
      38 => 'webstatus',
      39 => 'worskpaces',
      40 => 'www',
      41 => 'www2',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/html/whitelable.wx.agency/wl/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'laravel_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'system' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tenancy',
        'username' => 'root',
        'password' => '2a31b9a718fc8770e5524ebf7926f844c08d83b87d6e4429',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'tenancy',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tenancy',
        'username' => 'root',
        'password' => '2a31b9a718fc8770e5524ebf7926f844c08d83b87d6e4429',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'modes' => 
        array (
          0 => 'ONLY_FULL_GROUP_BY',
          1 => 'STRICT_TRANS_TABLES',
          2 => 'NO_ZERO_IN_DATE',
          3 => 'NO_ZERO_DATE',
          4 => 'ERROR_FOR_DIVISION_BY_ZERO',
          5 => 'NO_ENGINE_SUBSTITUTION',
        ),
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tenancy',
        'username' => 'root',
        'password' => '2a31b9a718fc8770e5524ebf7926f844c08d83b87d6e4429',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tenancy',
        'username' => 'root',
        'password' => '2a31b9a718fc8770e5524ebf7926f844c08d83b87d6e4429',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'options' => 
      array (
        'cluster' => 'predis',
        'prefix' => 'laravel_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/whitelable.wx.agency/wl/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/whitelable.wx.agency/wl/storage/app/public',
        'url' => 'http://whitelable.wx.agency/wl//storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
      'tenancy-default' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/whitelable.wx.agency/wl/storage/app/tenancy/tenants',
      ),
      'tenancy-webserver-apache2' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/whitelable.wx.agency/wl/storage/app/tenancy/webserver/apache2',
      ),
      'tenancy-webserver-nginx' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/html/whitelable.wx.agency/wl/storage/app/tenancy/webserver/nginx',
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/html/whitelable.wx.agency/wl/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/html/whitelable.wx.agency/wl/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => NULL,
    'username' => NULL,
    'password' => NULL,
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/html/whitelable.wx.agency/wl/resources/views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/html/whitelable.wx.agency/wl/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'tenancy' => 
  array (
    'key' => 'base64:Rx+15Nh5g6jWNYxBBqrw0oFjQwwsUDoCbxE9tg8sNes=',
    'models' => 
    array (
      'hostname' => 'Hyn\\Tenancy\\Models\\Hostname',
      'website' => 'Hyn\\Tenancy\\Models\\Website',
    ),
    'middleware' => 
    array (
      0 => 'Hyn\\Tenancy\\Middleware\\EagerIdentification',
      1 => 'Hyn\\Tenancy\\Middleware\\HostnameActions',
    ),
    'website' => 
    array (
      'disable-random-id' => false,
      'random-id-generator' => 'Hyn\\Tenancy\\Generators\\Uuid\\ShaGenerator',
      'uuid-limit-length-to-32' => true,
      'disk' => NULL,
      'auto-create-tenant-directory' => true,
      'auto-rename-tenant-directory' => true,
      'auto-delete-tenant-directory' => false,
      'cache' => 10,
    ),
    'hostname' => 
    array (
      'default' => NULL,
      'auto-identification' => true,
      'early-identification' => true,
      'abort-without-identified-hostname' => true,
      'cache' => 10,
      'update-app-url' => false,
    ),
    'db' => 
    array (
      'default' => NULL,
      'system-connection-name' => 'system',
      'tenant-connection-name' => 'tenant',
      'tenant-division-mode' => 'database',
      'password-generator' => 'Hyn\\Tenancy\\Generators\\Database\\DefaultPasswordGenerator',
      'tenant-migrations-path' => '/var/www/html/whitelable.wx.agency/wl/database/migrations/tenant',
      'tenant-seed-class' => false,
      'auto-create-tenant-database' => true,
      'auto-create-tenant-database-user' => true,
      'tenant-database-user-privileges' => NULL,
      'auto-rename-tenant-database' => true,
      'auto-delete-tenant-database' => false,
      'auto-delete-tenant-database-user' => false,
      'force-tenant-connection-of-models' => 
      array (
      ),
      'force-system-connection-of-models' => 
      array (
      ),
    ),
    'routes' => 
    array (
      'path' => '/var/www/html/whitelable.wx.agency/wl/routes/tenants.php',
      'replace-global' => false,
    ),
    'folders' => 
    array (
      'config' => 
      array (
        'enabled' => true,
        'blacklist' => 
        array (
          0 => 'database',
          1 => 'tenancy',
          2 => 'webserver',
        ),
      ),
      'routes' => 
      array (
        'enabled' => true,
        'prefix' => NULL,
      ),
      'trans' => 
      array (
        'enabled' => true,
        'override-global' => true,
        'namespace' => 'tenant',
      ),
      'vendor' => 
      array (
        'enabled' => true,
      ),
      'media' => 
      array (
        'enabled' => true,
      ),
      'views' => 
      array (
        'enabled' => true,
        'namespace' => NULL,
        'override-global' => true,
      ),
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/html/whitelable.wx.agency/wl/resources/views',
    ),
    'compiled' => '/var/www/html/whitelable.wx.agency/wl/storage/framework/views',
  ),
  'webserver' => 
  array (
    'apache2' => 
    array (
      'enabled' => false,
      'ports' => 
      array (
        'http' => 80,
        'https' => 443,
      ),
      'generator' => 'Hyn\\Tenancy\\Generators\\Webserver\\Vhost\\ApacheGenerator',
      'view' => 'tenancy.generators::webserver.apache.vhost',
      'disk' => NULL,
      'paths' => 
      array (
        'vhost-files' => 
        array (
          0 => '/etc/apache2/sites-enabled/',
        ),
        'actions' => 
        array (
          'exists' => '/etc/init.d/apache2',
          'test-config' => 'apache2ctl -t',
          'reload' => 'apache2ctl graceful',
        ),
      ),
    ),
    'nginx' => 
    array (
      'enabled' => false,
      'php-sock' => 'unix:/var/run/php/php7.3-fpm.sock',
      'ports' => 
      array (
        'http' => 80,
        'https' => 443,
      ),
      'generator' => 'Hyn\\Tenancy\\Generators\\Webserver\\Vhost\\NginxGenerator',
      'view' => 'tenancy.generators::webserver.nginx.vhost',
      'disk' => NULL,
      'paths' => 
      array (
        'vhost-files' => 
        array (
          0 => '/etc/nginx/sites-enabled/',
        ),
        'actions' => 
        array (
          'exists' => '/etc/init.d/nginx',
          'test-config' => '/etc/init.d/nginx configtest',
          'reload' => '/etc/init.d/nginx reload',
        ),
      ),
    ),
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
