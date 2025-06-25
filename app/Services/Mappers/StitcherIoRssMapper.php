<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class StitcherIoRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "stitcher_io";
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
