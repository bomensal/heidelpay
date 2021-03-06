<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\Heidelpay\Mapper;

use Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer;
use Generated\Shared\Transfer\HeidelpayResponseErrorTransfer;
use Heidelpay\PhpPaymentApi\Response;

interface ApiResponseToRegistrationResponseTransferInterface
{
    /**
     * @param \Heidelpay\PhpPaymentApi\Response $apiResponseObject
     * @param \Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer $registrationRequestTransfer
     *
     * @return void
     */
    public function map(Response $apiResponseObject, HeidelpayRegistrationRequestTransfer $registrationRequestTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer $registrationRequestTransfer
     * @param \Generated\Shared\Transfer\HeidelpayResponseErrorTransfer $errorTransfer
     *
     * @return void
     */
    public function hydrateErrorToRegistrationRequest(
        HeidelpayRegistrationRequestTransfer $registrationRequestTransfer,
        HeidelpayResponseErrorTransfer $errorTransfer
    ): void;
}
