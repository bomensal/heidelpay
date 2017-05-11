<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Heidelpay\MessageTranslator;

use Spryker\Client\Heidelpay\Sdk\HeidelpayApiAdapterInterface;

/**
 * @method \Spryker\Client\Heidelpay\HeidelpayFactory getFactory()
 */
class ErrorMessageTranslator implements ErrorMessageTranslatorInterface
{

    const HEIDELPAY_PAYMENT_FAILED_DEFAULT_ERROR_MESSAGE = 'page.checkout.heidelpay.payment.failed';

    /**
     * @var \Spryker\Client\Heidelpay\Sdk\HeidelpayApiAdapterInterface
     */
    protected $heidelpayApiAdapter;

    /**
     * @param \Spryker\Client\Heidelpay\Sdk\HeidelpayApiAdapterInterface $heidelpayApiAdapter
     */
    public function __construct(HeidelpayApiAdapterInterface $heidelpayApiAdapter)
    {
        $this->heidelpayApiAdapter = $heidelpayApiAdapter;
    }

    /**
     * @param string $errorCode
     * @param string $locale
     *
     * @return string
     */
    public function getTranslatedErrorMessageByCode($errorCode, $locale)
    {
        $translatedMessage = $this->getSdkTranslation($errorCode, $locale);

        if ($translatedMessage === null) {
            $translatedMessage = $this->getDefaultPaymentFailedMessage();
        }

        return $translatedMessage;
    }

    /**
     * @param string $errorCode
     * @param string $locale
     *
     * @return string
     */
    protected function getSdkTranslation($errorCode, $locale)
    {
        return $this->heidelpayApiAdapter
            ->getTranslatedMessageByCode($errorCode, $locale);
    }

    /**
     * @return string
     */
    protected function getDefaultPaymentFailedMessage()
    {
        return static::HEIDELPAY_PAYMENT_FAILED_DEFAULT_ERROR_MESSAGE;
    }

}
