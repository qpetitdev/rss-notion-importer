<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class MartinFowlerRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "martin_fowler";
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
