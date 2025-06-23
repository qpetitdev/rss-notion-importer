<?php

namespace App\Services\Mappers;

use App\Dto\NotionItem;
use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;
use Carbon\Carbon;
use SimplePie\Item;

class LaravelNewsRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "laravel_news";
    }

    protected function getCategory(): NotionCategoryEnum
    {
        return NotionCategoryEnum::BACKEND;
    }

    protected function getStatus(): NotionStatusEnum
    {
        return NotionStatusEnum::NOT_READ;
    }
}
