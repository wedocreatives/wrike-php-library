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
 * @deprecated Will be removed in version 3.0.0.
 * Deprecated Wrike Api Interface for resource getters.
 */
interface DeprecatedApiInterface
{
    /**
     * @deprecated getContactResource is deprecated and will be removed in 3.0.0. Use contacts().
     *
     * @return ContactResource
     */
    public function getContactResource(): ContactResource;

    /**
     * @return UserResource
     */
    public function getUserResource(): UserResource;

    /**
     * @return GroupResource
     */
    public function getGroupResource(): GroupResource;

    /**
     * @return InvitationResource
     */
    public function getInvitationResource(): InvitationResource;

    /**
     * @return AccountResource
     */
    public function getAccountResource(): AccountResource;

    /**
     * @return WorkflowResource
     */
    public function getWorkflowResource(): WorkflowResource;

    /**
     * @return CustomFieldResource
     */
    public function getCustomFieldResource(): CustomFieldResource;

    /**
     * @return FolderResource
     */
    public function getFolderResource(): FolderResource;

    /**
     * @return TaskResource
     */
    public function getTaskResource(): TaskResource;

    /**
     * @return CommentResource
     */
    public function getCommentResource(): CommentResource;

    /**
     * @return DependencyResource
     */
    public function getDependencyResource(): DependencyResource;

    /**
     * @return TimelogResource
     */
    public function getTimelogResource(): TimelogResource;

    /**
     * @return TimelogCategoryResource
     */
    public function getTimelogCategoryResource(): TimelogCategoryResource;

    /**
     * @return AttachmentResource
     */
    public function getAttachmentResource(): AttachmentResource;

    /**
     * @return VersionResource
     */
    public function getVersionResource(): VersionResource;

    /**
     * @return IdResource
     */
    public function getIdResource(): IdResource;

    /**
     * @return ColorResource
     */
    public function getColorResource(): ColorResource;
}
