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
                        'bank_code' => ['type' => 'keyword'],
                        'bank_name' => ['type' => 'keyword'],
                        'bank_branch' => ['type' => 'keyword'],
                        'bank_ifsc' => ['type' => 'keyword'],
                        'block_ulb_name' => ['type' => 'keyword'],
                        'gp_ward_name' => ['type' => 'keyword'],
                        'assembly_name' => ['type' => 'keyword'],
                        'rural_urban_id' => ['type' => 'keyword'],
                        'district_name' => ['type' => 'keyword'],
                        'local_body_name' => ['type' => 'keyword'],
                        'village_town_city' => ['type' => 'keyword'],
                        'house_premise_no' => ['type' => 'keyword'],
                        'post_office' => ['type' => 'keyword'],
                        'pincode' => ['type' => 'keyword'],
                        'branch_name' => ['type' => 'keyword'],
                        'created_by_dist_code' => ['type' => 'keyword'],
                        'created_by_local_body_code' => ['type' => 'keyword'],
                        'block_ulb_code' => ['type' => 'keyword'],
                        'gp_ward_code' => ['type' => 'keyword'],
                        'next_level_role_id' => ['type' => 'integer'],
                        'dob' => ['type' => 'date'],
                        'created_at' => ['type' => 'date'],
                    ]
                ]
            ]
        ];

        $client->indices()->create($params);

        $this->info("Index created.");
    }
}
