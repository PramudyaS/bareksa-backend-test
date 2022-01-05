<?php

namespace Domain\News\States;

use Support\Enum\Enum;

class NewsState extends Enum
{
    public const DRAFT     = 'draft';
    public const DELETED   = 'deleted';
    public const PUBLISH   = 'publish';
}
