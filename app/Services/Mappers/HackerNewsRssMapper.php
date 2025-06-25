<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class HackerNewsRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "hacker_news";
    }

    protected function getCategory(): NotionCategoryEnum
    {
        return NotionCategoryEnum::ARCHITECTURE;
    }

    protected function getStatus(): NotionStatusEnum
    {
        return NotionStatusEnum::NOT_READ;
    }
}
