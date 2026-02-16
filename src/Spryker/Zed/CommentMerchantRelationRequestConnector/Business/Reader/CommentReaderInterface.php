<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Reader;

interface CommentReaderInterface
{
    /**
     * @param string $ownerType
     * @param array<int> $ownerIds
     *
     * @return array<int, \Generated\Shared\Transfer\CommentThreadTransfer>
     */
    public function getCommentThreadsIndexedByOwnerId(string $ownerType, array $ownerIds): array;
}
