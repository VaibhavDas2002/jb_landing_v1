<?php

namespace App\Console\Commands;

use App\Models\BenEntry;
use Illuminate\Console\Command;
use Elastic\Elasticsearch\Client;

class SyncBeneficiariesToES extends Command
{
    protected $signature = 'es:sync-beneficiaries';
    protected $description = 'Sync all beneficiaries to Elasticsearch';

    public function handle()
    {
        /** @var Client $client */
        $client = app('elasticsearch');

        $this->info("Starting sync...");

        $total = BenEntry::count();
        $this->info("Total records: {$total}");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        BenEntry::chunk(500, function ($rows) use ($client, $bar) {

            foreach ($rows as $row) {

                // Convert row to ES format
                $data = $row->toSearchArray();

                // Index into Elasticsearch
                $client->index([
                    'index' => 'beneficiaries',
                    'id'    => $row->id,
                    'body'  => $data
                ]);

                $bar->advance();
            }
        });

        $bar->finish();
        $this->newLine(2);
        $this->info("Sync completed successfully!");

        return Command::SUCCESS;
    }
}
