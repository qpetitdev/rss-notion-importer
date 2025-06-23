<?php

namespace App\Enums;

enum NotionStatusEnum: string
{
    case NOT_READ = 'Pas lu';
    case READ = 'Lu';
    case IN_PROGRESS = 'En cours';
}
