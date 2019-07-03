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
use wedocreatives\WrikePhpLibrary\Resource\Traits\CreateForFolderTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Task Resource.
 */
class TaskResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForFolderTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use CreateForFolderTrait;
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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::TASKS,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::TASKS_FOR_FOLDER,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::TASKS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::TASKS_BY_IDS,
            ResourceMethodEnum::CREATE_FOR_FOLDER => RequestPathFormatEnum::TASKS_FOR_FOLDER,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::TASKS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::TASKS_BY_ID,
        ];
    }
}
