<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Heidelpay\Business\Payment\Transaction;

use Generated\Shared\Transfer\HeidelpayExternalPaymentResponseTransfer;
use Spryker\Zed\Heidelpay\Business\Payment\Type\PaymentWithExternalResponseInterface;

interface ExternalResponseTransactionInterface
{

    /**
     * @param \Generated\Shared\Transfer\HeidelpayExternalPaymentResponseTransfer $externalResponseTransfer
     * @param \Spryker\Zed\Heidelpay\Business\Payment\Type\PaymentWithExternalResponseInterface $paymentAdapter
     *
     * @return \Generated\Shared\Transfer\HeidelpayResponseTransfer
     */
    public function executeTransaction(
        HeidelpayExternalPaymentResponseTransfer $externalResponseTransfer,
        PaymentWithExternalResponseInterface $paymentAdapter
    );

}
