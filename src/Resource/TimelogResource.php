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

namespace wedocreatives\WrikePhpLibrary\Resource;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use wedocreatives\WrikePhpLibrary\Resource\Traits\CreateForTaskTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForContactTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForTimelogCategoryTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Timelog Resource.
 */
class TimelogResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForContactTrait;
    use GetAllForFolderTrait;
    use GetAllForTaskTrait;
    use GetAllForTimelogCategoryTrait;
    use GetByIdTrait;
    use CreateForTaskTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    protected function getResourceMethodConfiguration(): array
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::TIMELOGS,
            ResourceMethodEnum::GET_ALL_FOR_CONTACT => RequestPathFormatEnum::TIMELOGS_FOR_CONTACT,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::TIMELOGS_FOR_FOLDER,
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::TIMELOGS_FOR_TASK,
            ResourceMethodEnum::GET_ALL_FOR_TIMELOG_CATEGORY => RequestPathFormatEnum::TIMELOGS_FOR_TIMELOG_CATEGORY,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::TIMELOGS_BY_ID,
            ResourceMethodEnum::CREATE_FOR_TASK => RequestPathFormatEnum::TIMELOGS_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::TIMELOGS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::TIMELOGS_BY_ID,
        ];
    }
}
