<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class DevtoVueJsMapperRss extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "devto_vue_js";
    }

    protected function getCategory(): NotionCategoryEnum
    {
        return NotionCategoryEnum::FRONTEND;
    }

    protected function getStatus(): NotionStatusEnum
    {
        return NotionStatusEnum::NOT_READ;
    }
}
