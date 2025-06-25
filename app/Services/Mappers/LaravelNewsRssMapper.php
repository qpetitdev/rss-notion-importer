<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

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
