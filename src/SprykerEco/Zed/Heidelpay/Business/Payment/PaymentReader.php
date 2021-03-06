<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\Heidelpay\Business\Payment;

use Generated\Shared\Transfer\HeidelpayPaymentTransfer;
use Orm\Zed\Heidelpay\Persistence\SpyPaymentHeidelpay;
use SprykerEco\Zed\Heidelpay\Persistence\HeidelpayQueryContainerInterface;

class PaymentReader implements PaymentReaderInterface
{
    /**
     * @var \SprykerEco\Zed\Heidelpay\Persistence\HeidelpayQueryContainerInterface
     */
    protected $heidelpayQueryContainer;

    /**
     * @param \SprykerEco\Zed\Heidelpay\Persistence\HeidelpayQueryContainerInterface $heidelpayQueryContainer
     */
    public function __construct(HeidelpayQueryContainerInterface $heidelpayQueryContainer)
    {
        $this->heidelpayQueryContainer = $heidelpayQueryContainer;
    }

    /**
     * @param int $idSalesOrder
     *
     * @return \Generated\Shared\Transfer\HeidelpayPaymentTransfer
     */
    public function getPaymentByIdSalesOrder(int $idSalesOrder): HeidelpayPaymentTransfer
    {
        $heidelpayPaymentEntity = $this->getPaymentEntityByIdSalesOrder($idSalesOrder);

        $paymentTransfer = new HeidelpayPaymentTransfer();

        if ($heidelpayPaymentEntity === null) {
            return $paymentTransfer;
        }

        $paymentTransfer->fromArray($heidelpayPaymentEntity->toArray(), true);

        return $paymentTransfer;
    }

    /**
     * @param int $idSalesOrder
     *
     * @return string|null
     */
    public function getIdBasketByIdSalesOrder(int $idSalesOrder): ?string
    {
        $heidelpayPaymentEntity = $this->getPaymentEntityByIdSalesOrder($idSalesOrder);

        return $heidelpayPaymentEntity->getIdBasket();
    }

    /**
     * @param int $idSalesOrder
     *
     * @return \Orm\Zed\Heidelpay\Persistence\SpyPaymentHeidelpay|null
     */
    protected function getPaymentEntityByIdSalesOrder(int $idSalesOrder): ?SpyPaymentHeidelpay
    {
        $heidelpayPaymentEntity = $this->heidelpayQueryContainer
            ->queryPaymentByIdSalesOrder($idSalesOrder)
            ->findOne();

        return $heidelpayPaymentEntity;
    }
}
