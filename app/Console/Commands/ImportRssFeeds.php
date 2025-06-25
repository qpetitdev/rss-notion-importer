<?php

namespace App\Console\Commands;

use App\Models\ImportedItem;
use App\Services\Mappers\RssFeedMapperInterface;
use App\Services\NotionService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use SimplePie\SimplePie;
use Str;

class ImportRssFeeds extends Command
{
    public function __construct(
        private readonly NotionService $notionService,
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import RSS Feeds to Notion database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $sources = config('rss.sources');

        foreach ($sources as $sourceName => $sourceConfig) {
            [$created, $ignored] = [0, 0];

            $this->info("Working on source: {$sourceName}");

            /** @var RssFeedMapperInterface $mapper */
            $mapper = app($sourceConfig['mapper']);

            $feed = new SimplePie();
            $feed->enable_cache(false);
            $feed->set_feed_url($sourceConfig['url']);
            $feed->init();

            $items = $feed->get_items();

            $total = count($items);
            if ($total === 0) {
                $this->warn("No item found for {$sourceName}");
                continue;
            }

            $this->output->progressStart($total);

            foreach ($items as $item) {
                try {
                    $notionItem = $mapper->map($item);

                    if (ImportedItem::where('url', $notionItem->url)->exists()) {
                        $ignored++;
                        continue;
                    }

                    $this->notionService->insert($notionItem);

                    ImportedItem::create(["url" => $notionItem->url]);
                    $created++;
                } catch (\Throwable $e) {
                    $this->error("Error on : " . $item->get_title() . ' - ' . $e->getMessage());
                }

                $this->output->progressAdvance();
            }

            $this->output->progressFinish();
            $this->info("$total " . Str::plural("item", $total) . " imported for $sourceName :");
            $this->info("   - $created " . Str::plural("item", $created) . " created");
            $this->info("   - $ignored " . Str::plural("item", $ignored) . " ignored");
        }
    }
}
