<?php

namespace App\Services\Mappers;

use App\Dto\NotionItem;
use SimplePie\Item;

interface RssFeedMapperInterface
{
    public function map(Item $item): NotionItem;
}
