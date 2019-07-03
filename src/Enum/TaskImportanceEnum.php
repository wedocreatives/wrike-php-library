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
 * Task Importance Enum.
 */
class TaskImportanceEnum extends AbstractEnum
{
    public const HIGH = 'High';
    public const NORMAL = 'Normal';
    public const LOW = 'Low';
}
