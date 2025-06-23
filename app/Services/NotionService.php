<?php

namespace App\Services;

use App\Dto\NotionItem;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class NotionService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.notion.com/v1/',
            'headers' => [
                'Notion-Version'    => '2022-06-28',
                'Content-Type'      => 'application/json',
            ],
        ]);
    }

    public function insert(NotionItem $item): void
    {
        $token = config('services.notion.token');
        $databaseId = config('services.notion.database_id');

        if (!$token || !$databaseId) {
            throw new \RuntimeException("Notion config is missing.");
        }

        try {
            $this->client->post('pages', [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                ],
                'json' => [
                    'parent' => ['database_id' => $databaseId],
                    'properties' => [
                        'Titre' => [
                            'title' => [[
                                'text' => ['content' => $item->title]
                            ]]
                        ],
                        'URL' => [
                            'url' => $item->url
                        ],
                        'Source' => [
                            'rich_text' => [[
                                'text' => ['content' => $item->sourceName]
                            ]]
                        ],
                        'Date de publication' => [
                            'date' => ['start' => $item->publishedAt->toIso8601String()]
                        ],
                        'État' => [
                            'status' => ['name' => $item->status->value],
                        ],
                        'Catégorie' => [
                            'select' => ['name' => $item->category->value]
                        ],
                    ]
                ]
            ]);
        } catch (\Throwable $e) {
            Log::error('Error on item creation in Notion database.', [
                'exception' => $e->getMessage(),
                'item' => $item,
            ]);
            throw $e;
        }
    }
}
