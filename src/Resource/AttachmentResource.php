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
use wedocreatives\WrikePhpLibrary\Resource\Traits\DeleteTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\DownloadPreviewTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\DownloadTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForFolderTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllForTaskTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdsTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetByIdTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetPublicUrlTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UpdateTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UploadForFolderTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UploadForTaskTrait;

/**
 * Attachment Resource.
 */
class AttachmentResource extends AbstractResource
{
    use GetAllTrait;
    use GetAllForFolderTrait;
    use GetAllForTaskTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use DownloadTrait;
    use DownloadPreviewTrait;
    use GetPublicUrlTrait;
    use UploadForFolderTrait;
    use UploadForTaskTrait;
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
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::ATTACHMENTS,
            ResourceMethodEnum::GET_ALL_FOR_FOLDER => RequestPathFormatEnum::ATTACHMENTS_FOR_FOLDER,
            ResourceMethodEnum::GET_ALL_FOR_TASK => RequestPathFormatEnum::ATTACHMENTS_FOR_TASK,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::ATTACHMENTS_BY_IDS,
            ResourceMethodEnum::DOWNLOAD => RequestPathFormatEnum::ATTACHMENTS_DOWNLOAD,
            ResourceMethodEnum::DOWNLOAD_PREVIEW => RequestPathFormatEnum::ATTACHMENTS_DOWNLOAD_PREVIEW,
            ResourceMethodEnum::GET_PUBLIC_URL => RequestPathFormatEnum::ATTACHMENTS_URL,
            ResourceMethodEnum::UPLOAD_FOR_FOLDER => RequestPathFormatEnum::ATTACHMENTS_FOR_FOLDER,
            ResourceMethodEnum::UPLOAD_FOR_TASK => RequestPathFormatEnum::ATTACHMENTS_FOR_TASK,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::ATTACHMENTS_BY_ID,
        ];
    }
}
