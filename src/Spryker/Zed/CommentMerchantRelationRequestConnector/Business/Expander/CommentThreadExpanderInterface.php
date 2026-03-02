<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Expander;

use Generated\Shared\Transfer\MerchantRelationRequestCollectionTransfer;

interface CommentThreadExpanderInterface
{
    public function expandMerchantRelationRequestCollection(
        MerchantRelationRequestCollectionTransfer $merchantRelationRequestCollectionTransfer
    ): MerchantRelationRequestCollectionTransfer;
}
