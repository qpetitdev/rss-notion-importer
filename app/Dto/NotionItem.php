<?php

namespace App\Dto;


use App\Enums\NotionCategoryEnum;
use App\Enums\NotionStatusEnum;
use Carbon\Carbon;

class NotionItem
{
    public function __construct(
        public string $title,
        public string $url,
        public string $sourceName,
        public Carbon $publishedAt,
        public NotionCategoryEnum $category,
        public NotionStatusEnum $status,
    ){}
}
