<?php

declare(strict_types=1);

/*
 * This file is part of the wedocreatives/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpLibrary\Enum;

/**
 * Task Dates Type Enum.
 */
class TaskDatesTypeEnum extends AbstractEnum
{
    public const BACKLOG = 'Backlog';
    public const MILESTONE = 'Milestone';
    public const PLANNED = 'Planned';
}
