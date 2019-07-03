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
 * Dependency Relation Type Enum.
 */
class DependencyRelationTypeEnum extends AbstractEnum
{
    public const START_TO_START = 'StartToStart';
    public const START_TO_FINISH = 'StartToFinish';
    public const FINISH_TO_START = 'FinishToStart';
    public const FINISH_TO_FINISH = 'FinishToFinish';
}
