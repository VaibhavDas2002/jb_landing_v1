<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'pgsql_sp' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '172.20.60.107'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'sneherporosh'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'sslmode' => 'prefer',
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        'pgsql2' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'bandhu',
            'sslmode' => 'prefer',
        ],

        'pgsql3' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_doc_server_local'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'jb_doc',
            'sslmode' => 'prefer',
        ],

        'pgsql4' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'manabik',
            'sslmode' => 'prefer',
        ],
        'pgsql5' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'pension',
            'sslmode' => 'prefer',
        ],
        'pgsql6' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'fisherman_oap',
            'sslmode' => 'prefer',
        ],
        'pgsql7' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'prachesta',
            'sslmode' => 'prefer',
        ],

        'pgsql8' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'sbi',
            'sslmode' => 'prefer',
        ],
        'pgsql9' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'msme',
            'sslmode' => 'prefer',
        ],
        'pgsql10' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'weavers',
            'sslmode' => 'prefer',
        ],
        'pgsql_mis' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'sslmode' => 'prefer',
        ],

        'pgsql_legacy' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'legacy',
            'sslmode' => 'prefer',
        ],

        'pgsql_ifsc' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'ifsc',
            'sslmode' => 'prefer',
        ],
        'pgsql_report' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'pension',
            'sslmode' => 'prefer',
        ],
        'pgsql11' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'oap_st_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsql12' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'oap_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsql13' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'wp_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsql14' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'lokprasar_retainer',
            'sslmode' => 'prefer',
        ],
        'pgsql15' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'lokprasar_pensioner',
            'sslmode' => 'prefer',
        ],
        'pgsql16' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'farmer',
            'sslmode' => 'prefer',
        ],
        'pgsqlpurohitmonthly' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'purohit_monthly',
            'sslmode' => 'prefer',
        ],
        'pgsqlpurohithousing' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'purohit_housing',
            'sslmode' => 'prefer',
        ],
        'pgsql20' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'lk_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsqllbtemp' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'lb_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsql_ifms' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_local'),
            'username' => env('DB_USERNAME', 'jaibangla'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'ifms',
            'sslmode' => 'prefer',
        ],
        'pgsqlwp_mis' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla_local',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'wp_wcd',
            'sslmode' => 'prefer',
        ],
        'pgsqloap_mis' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'oap_wcd',
            'sslmode' => 'prefer',
        ],

        'pgsqlmanabik_mis' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'manabik',
            'sslmode' => 'prefer',
        ],
        'pgsql_main_mis' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'jaibangla_doc_server_local'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',


            'sslmode' => 'prefer',
        ],
        'pgsql_encwrite' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla_doc_server_local',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',

            'sslmode' => 'prefer',
        ],
        'pgsql_paywrite' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla_payment',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',

            'sslmode' => 'prefer',
        ],
        'pgsql_payread' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla_payment',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',

            'sslmode' => 'prefer',
        ],
        'pgsql_main' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'jaibangla_local',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',

            'sslmode' => 'prefer',
        ],
        'pgsql_lb_encwrite' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'database' => 'lakkhirBhandar_local',
            'username' => 'postgres',
            'password' => '123',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'lb_scheme',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
