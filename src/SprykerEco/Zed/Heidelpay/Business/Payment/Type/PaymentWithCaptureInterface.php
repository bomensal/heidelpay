<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\Heidelpay\Business\Payment\Type;

use Generated\Shared\Transfer\HeidelpayRequestTransfer;
use Generated\Shared\Transfer\HeidelpayResponseTransfer;

interface PaymentWithCaptureInterface
{
    /**
     * @param \Generated\Shared\Transfer\HeidelpayRequestTransfer $captureRequestTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayResponseTransfer
     */
    public function capture(HeidelpayRequestTransfer $captureRequestTransfer): HeidelpayResponseTransfer;
}
