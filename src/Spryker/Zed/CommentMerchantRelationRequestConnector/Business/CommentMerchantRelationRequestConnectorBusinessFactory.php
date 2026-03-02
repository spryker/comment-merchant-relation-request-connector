<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CommentMerchantRelationRequestConnector\Business;

use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Copier\CommentThreadCopier;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Copier\CommentThreadCopierInterface;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Expander\CommentThreadExpander;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Expander\CommentThreadExpanderInterface;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Reader\CommentReader;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Reader\CommentReaderInterface;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Reader\MerchantRelationRequestReader;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Business\Reader\MerchantRelationRequestReaderInterface;
use Spryker\Zed\CommentMerchantRelationRequestConnector\CommentMerchantRelationRequestConnectorDependencyProvider;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Dependency\Facade\CommentMerchantRelationRequestConnectorToCommentFacadeInterface;
use Spryker\Zed\CommentMerchantRelationRequestConnector\Dependency\Facade\CommentMerchantRelationRequestConnectorToMerchantRelationRequestFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Spryker\Zed\CommentMerchantRelationRequestConnector\CommentMerchantRelationRequestConnectorConfig getConfig()
 */
class CommentMerchantRelationRequestConnectorBusinessFactory extends AbstractBusinessFactory
{
    public function createCommentThreadExpander(): CommentThreadExpanderInterface
    {
        return new CommentThreadExpander(
            $this->createCommentReader(),
        );
    }

    public function createCommentThreadCopier(): CommentThreadCopierInterface
    {
        return new CommentThreadCopier(
            $this->getCommentFacade(),
            $this->createMerchantRelationRequestReader(),
        );
    }

    public function createCommentReader(): CommentReaderInterface
    {
        return new CommentReader(
            $this->getCommentFacade(),
        );
    }

    public function createMerchantRelationRequestReader(): MerchantRelationRequestReaderInterface
    {
        return new MerchantRelationRequestReader(
            $this->getMerchantRelationRequestFacade(),
        );
    }

    public function getCommentFacade(): CommentMerchantRelationRequestConnectorToCommentFacadeInterface
    {
        return $this->getProvidedDependency(CommentMerchantRelationRequestConnectorDependencyProvider::FACADE_COMMENT);
    }

    public function getMerchantRelationRequestFacade(): CommentMerchantRelationRequestConnectorToMerchantRelationRequestFacadeInterface
    {
        return $this->getProvidedDependency(CommentMerchantRelationRequestConnectorDependencyProvider::FACADE_MERCHANT_RELATION_REQUEST);
    }
}
