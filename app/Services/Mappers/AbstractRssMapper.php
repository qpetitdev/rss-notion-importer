<?php

namespace App\Services\Mappers;

use App\Dto\NotionItem;
use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;
use Carbon\Carbon;
use SimplePie\Item;

abstract class AbstractRssMapper
{
    public function map(Item $item): NotionItem
    {
        return new NotionItem(
            title: $this->getTitle($item),
            url: $this->getUrl($item),
            sourceName: $this->getSourceName(),
            publishedAt: $this->getPublishedAt($item),
            category: $this->getCategory(),
            status: $this->getStatus()
        );
    }

    protected function getTitle(Item $item): string
    {
        return $item->get_title();
    }

    protected function getUrl(Item $item): string
    {
        return $item->get_link();
    }

    protected function getPublishedAt(Item $item): Carbon
    {
        return Carbon::parse($item->get_date());
    }

    abstract protected function getSourceName(): string;
    abstract protected function getCategory(): NotionCategoryEnum;
    abstract protected function getStatus(): NotionStatusEnum;
}
