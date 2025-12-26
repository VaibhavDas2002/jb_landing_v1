<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateBeneficiaryIndex extends Command
{
    protected $signature = 'es:create-beneficiary-index';

    public function handle()
    {
        $client = app('elasticsearch');

        $params = [
            'index' => 'beneficiaries',
            'body' => [
                'settings' => [
                    'analysis' => [
                        'analyzer' => [
                            'autocomplete' => [
                                'tokenizer' => 'autocomplete',
                                'filter' => ['lowercase']
                            ]
                        ],
                        'tokenizer' => [
                            'autocomplete' => [
                                'type' => 'edge_ngram',
                                'min_gram' => 1,
                                'max_gram' => 20
                            ]
                        ]
                    ]
                ],
                'mappings' => [
                    'properties' => [
                        'ben_fname' => ['type' => 'text', 'analyzer' => 'autocomplete'],
                        'ben_mname' => ['type' => 'text', 'analyzer' => 'autocomplete'],
                        'ben_lname' => ['type' => 'text', 'analyzer' => 'autocomplete'],
                        'full_name' => ['type' => 'text', 'analyzer' => 'autocomplete'],

                        'aadhar_no' => ['type' => 'keyword'],
                        'mobile_no' => ['type' => 'keyword'],
                        'district' => ['type' => 'keyword'],
                    ]
                ]
            ]
        ];

        $client->indices()->create($params);

        $this->info("Index created.");
    }
}
