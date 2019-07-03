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

namespace wedocreatives\WrikePhpLibrary;

use wedocreatives\WrikePhpLibrary\Resource\AccountResource;
use wedocreatives\WrikePhpLibrary\Resource\AttachmentResource;
use wedocreatives\WrikePhpLibrary\Resource\ColorResource;
use wedocreatives\WrikePhpLibrary\Resource\CommentResource;
use wedocreatives\WrikePhpLibrary\Resource\ContactResource;
use wedocreatives\WrikePhpLibrary\Resource\CustomFieldResource;
use wedocreatives\WrikePhpLibrary\Resource\DependencyResource;
use wedocreatives\WrikePhpLibrary\Resource\FolderResource;
use wedocreatives\WrikePhpLibrary\Resource\GroupResource;
use wedocreatives\WrikePhpLibrary\Resource\IdResource;
use wedocreatives\WrikePhpLibrary\Resource\InvitationResource;
use wedocreatives\WrikePhpLibrary\Resource\TaskResource;
use wedocreatives\WrikePhpLibrary\Resource\TimelogCategoryResource;
use wedocreatives\WrikePhpLibrary\Resource\TimelogResource;
use wedocreatives\WrikePhpLibrary\Resource\UserResource;
use wedocreatives\WrikePhpLibrary\Resource\VersionResource;
use wedocreatives\WrikePhpLibrary\Resource\WorkflowResource;

/**
 * General Wrike Api Interface for resource getters.
 */
interface ApiInterface extends DeprecatedApiInterface
{
    /**
     * @return ContactResource
     */
    public function contacts(): ContactResource;

    /**
     * @return UserResource
     */
    public function users(): UserResource;

    /**
     * @return GroupResource
     */
    public function groups(): GroupResource;

    /**
     * @return InvitationResource
     */
    public function invitations(): InvitationResource;

    /**
     * @return AccountResource
     */
    public function account(): AccountResource;

    /**
     * @return WorkflowResource
     */
    public function workflows(): WorkflowResource;

    /**
     * @return CustomFieldResource
     */
    public function customFields(): CustomFieldResource;

    /**
     * @return FolderResource
     */
    public function folders(): FolderResource;

    /**
     * @return TaskResource
     */
    public function tasks(): TaskResource;

    /**
     * @return CommentResource
     */
    public function comments(): CommentResource;

    /**
     * @return DependencyResource
     */
    public function dependencies(): DependencyResource;

    /**
     * @return TimelogResource
     */
    public function timelogs(): TimelogResource;

    /**
     * @return TimelogCategoryResource
     */
    public function timelogCategories(): TimelogCategoryResource;

    /**
     * @return AttachmentResource
     */
    public function attachments(): AttachmentResource;

    /**
     * @return VersionResource
     */
    public function version(): VersionResource;

    /**
     * @return IdResource
     */
    public function ids(): IdResource;

    /**
     * @return ColorResource
     */
    public function colors(): ColorResource;

    /**
     * Calculate params in array to format expected by Wrike Api.
     *
     * @param array $params
     *
     * @return array
     */
    public function normalizeParams(array $params): array;
}
