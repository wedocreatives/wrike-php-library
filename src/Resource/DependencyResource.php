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
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Dependency Resource.
 */
class DependencyResource extends AbstractResource
{
    use GetAllForTaskTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
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
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::DEPENDENCIES_FOR_TASK,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::DEPENDENCIES_BY_IDS,
            ResourceMethodEnum::CREATE_FOR_TASK => RequestPathFormatEnum::DEPENDENCIES_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::DEPENDENCIES_BY_ID,
        ];
    }
}
