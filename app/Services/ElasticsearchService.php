<?php

namespace App\Services;

use Elastic\Elasticsearch\ClientBuilder;

class ElasticsearchService
{
    public static function client()
    {
        return ClientBuilder::create()
            ->setHosts([config('elasticsearch.host')])
            ->build();
    }
}
