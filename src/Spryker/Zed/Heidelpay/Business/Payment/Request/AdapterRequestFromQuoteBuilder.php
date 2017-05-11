<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Heidelpay\Business\Payment\Request;

use Generated\Shared\Transfer\HeidelpayRequestTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Heidelpay\HeidelpayConstants;
use Spryker\Zed\Heidelpay\Business\Mapper\QuoteToHeidelpayRequestInterface;
use Spryker\Zed\Heidelpay\Dependency\Facade\HeidelpayToCurrencyInterface;
use Spryker\Zed\Heidelpay\HeidelpayConfig;

class AdapterRequestFromQuoteBuilder extends BaseAdapterRequestBuilder implements AdapterRequestFromQuoteBuilderInterface
{

    /**
     * @var \Spryker\Zed\Heidelpay\Business\Mapper\QuoteToHeidelpayRequestInterface
     */
    protected $quoteToHeidelpayMapper;

    /**
     * @var \Spryker\Zed\Heidelpay\Dependency\Facade\HeidelpayToMoneyInterface
     */
    protected $currencyFacade;

    /**
     * @var \Spryker\Zed\Heidelpay\HeidelpayConfig
     */
    protected $config;

    /**
     * @param \Spryker\Zed\Heidelpay\Business\Mapper\QuoteToHeidelpayRequestInterface $quoteToHeidelpayMapper
     * @param \Spryker\Zed\Heidelpay\Dependency\Facade\HeidelpayToCurrencyInterface $currencyFacade
     * @param \Spryker\Zed\Heidelpay\HeidelpayConfig $config
     */
    public function __construct(
        QuoteToHeidelpayRequestInterface $quoteToHeidelpayMapper,
        HeidelpayToCurrencyInterface $currencyFacade,
        HeidelpayConfig $config
    ) {
        $this->currencyFacade = $currencyFacade;
        $this->quoteToHeidelpayMapper = $quoteToHeidelpayMapper;
        $this->config = $config;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayRequestTransfer
     */
    public function buildCreditCardRegistrationRequest(QuoteTransfer $quoteTransfer)
    {
        $registrationRequestTransfer = $this->buildBaseQuoteHeidelpayRequest($quoteTransfer);
        $this->setCreditCardTransactionChannel($registrationRequestTransfer);
        $this->setYvesUrlForAsyncIframeResponse($registrationRequestTransfer);

        return $registrationRequestTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\HeidelpayRequestTransfer $heidelpayRequestTransfer
     *
     * @return void
     */
    protected function setCreditCardTransactionChannel(HeidelpayRequestTransfer $heidelpayRequestTransfer)
    {
        $paymentMethod = HeidelpayConstants::PAYMENT_METHOD_CREDIT_CARD_SECURE;
        $this->hydrateTransactionChannel($heidelpayRequestTransfer, $paymentMethod);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayRequestTransfer
     */
    protected function buildBaseQuoteHeidelpayRequest(QuoteTransfer $quoteTransfer)
    {
        $requestTransfer = new HeidelpayRequestTransfer();

        $requestTransfer = $this->hydrateQuote($requestTransfer, $quoteTransfer);
        $requestTransfer = $this->hydrateRequestData($requestTransfer);

        $paymentMethod = $quoteTransfer->getPayment()->getPaymentMethod();

        $requestTransfer = $this->hydrateTransactionChannel($requestTransfer, $paymentMethod);

        return $requestTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\HeidelpayRequestTransfer $heidelpayRequestTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayRequestTransfer
     */
    protected function hydrateQuote(HeidelpayRequestTransfer $heidelpayRequestTransfer, QuoteTransfer $quoteTransfer)
    {
        $this->quoteToHeidelpayMapper->map($quoteTransfer, $heidelpayRequestTransfer);

        return $heidelpayRequestTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\HeidelpayRequestTransfer $requestTransfer
     *
     * @return void
     */
    protected function setYvesUrlForAsyncIframeResponse(HeidelpayRequestTransfer $requestTransfer)
    {
        $requestTransfer->getAsync()->setResponseUrl(
            $this->config->getYvesUrlForAsyncIframeResponse()
        );
    }

}
