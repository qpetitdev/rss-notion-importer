<?php

namespace App\Services\Mappers;

use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;

class GodotEngineRssMapper extends AbstractRssMapper
{
    protected function getSourceName(): string
    {
        return "godot_engine";
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
