<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class RedditGameDevRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "reddit_game_dev";
    }

    protected function getCategory(): NotionCategoryEnum
    {
        return NotionCategoryEnum::GAME_DEV;
    }

    protected function getStatus(): NotionStatusEnum
    {
        return NotionStatusEnum::NOT_READ;
    }
}
