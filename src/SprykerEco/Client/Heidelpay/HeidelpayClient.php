<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\Heidelpay;

use Generated\Shared\Transfer\HeidelpayCreditCardPaymentOptionsTransfer;
use Generated\Shared\Transfer\HeidelpayCreditCardRegistrationTransfer;
use Generated\Shared\Transfer\HeidelpayDirectDebitPaymentOptionsTransfer;
use Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer;
use Generated\Shared\Transfer\HeidelpayExternalPaymentRequestTransfer;
use Generated\Shared\Transfer\HeidelpayNotificationTransfer;
use Generated\Shared\Transfer\HeidelpayPaymentProcessingResponseTransfer;
use Generated\Shared\Transfer\HeidelpayRegistrationByIdAndQuoteRequestTransfer;
use Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer;
use Generated\Shared\Transfer\HeidelpayRegistrationSaveResponseTransfer;
use Generated\Shared\Transfer\HeidelpayResponseTransfer;
use Generated\Shared\Transfer\HeidelpayTransactionLogTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerEco\Client\Heidelpay\HeidelpayFactory getFactory()
 */
class HeidelpayClient extends AbstractClient implements HeidelpayClientInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $errorCode
     *
     * @return string
     */
    public function translateErrorMessageByCode(string $errorCode): string
    {
        $currentLocale = $this->getCurrentLocale();

        return $this->getFactory()
            ->createHeidelpayApiAdapter()
            ->getTranslatedMessageByCode($errorCode, $currentLocale);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $orderReference
     *
     * @return \Generated\Shared\Transfer\HeidelpayTransactionLogTransfer
     */
    public function getAuthorizeTransactionLogForOrder(string $orderReference): HeidelpayTransactionLogTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->getAuthorizeTransactionLogByOrderReference($orderReference);
    }

    /**
     * @deprecated Use `getQuote()` instead.
     *
     * {@inheritdoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuoteFromSession(): QuoteTransfer
    {
        return $this->getFactory()
            ->getQuoteClient()
            ->getQuote();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuote(): QuoteTransfer
    {
        return $this->getFactory()
            ->getQuoteClient()
            ->getQuote();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $externalResponse
     *
     * @return \Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer
     */
    public function parseExternalResponse(array $externalResponse): HeidelpayRegistrationRequestTransfer
    {
        return $this->getFactory()
            ->createExternalResponseValidator()
            ->parseExternalResponse($externalResponse);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string[] $externalResponse
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer
     */
    public function parseDirectDebitRegistrationResponse(array $externalResponse): HeidelpayDirectDebitRegistrationTransfer
    {
        return $this->getFactory()
            ->createDirectDebitRegistrationResponseParser()
            ->parseResponse($externalResponse);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayResponseTransfer
     */
    public function sendHeidelpayEasycreditInitializeRequest(QuoteTransfer $quoteTransfer): HeidelpayResponseTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->sendEasycreditInitializeRequest($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $externalResponse
     *
     * @return \Generated\Shared\Transfer\HeidelpayPaymentProcessingResponseTransfer
     */
    public function processExternalPaymentResponse(array $externalResponse): HeidelpayPaymentProcessingResponseTransfer
    {
        $externalResponseTransfer = $this->buildTransferFromExternalResponseArray($externalResponse);

        return $this->getFactory()
            ->createZedStub()
            ->processExternalPaymentResponse($externalResponseTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $externalResponse
     *
     * @return \Generated\Shared\Transfer\HeidelpayPaymentProcessingResponseTransfer
     */
    public function processExternalEasyCreditPaymentResponse(
        array $externalResponse
    ): HeidelpayPaymentProcessingResponseTransfer {
        $externalResponseTransfer = $this->buildTransferFromExternalResponseArray($externalResponse);

        return $this->getFactory()
            ->createZedStub()
            ->processExternalEasyCreditPaymentResponse($externalResponseTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\HeidelpayRegistrationRequestTransfer $registrationRequestTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayRegistrationSaveResponseTransfer
     */
    public function saveCreditCardRegistration(
        HeidelpayRegistrationRequestTransfer $registrationRequestTransfer
    ): HeidelpayRegistrationSaveResponseTransfer {
        return $this->getFactory()
            ->createZedStub()
            ->saveCreditCardRegistration($registrationRequestTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer $directDebitRegistrationTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer
     */
    public function saveDirectDebitRegistration(
        HeidelpayDirectDebitRegistrationTransfer $directDebitRegistrationTransfer
    ): HeidelpayDirectDebitRegistrationTransfer {
        return $this->getFactory()
            ->createZedStub()
            ->saveDirectDebitRegistration($directDebitRegistrationTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idRegistration
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayCreditCardRegistrationTransfer|null
     */
    public function findRegistrationByIdAndQuote(
        int $idRegistration,
        QuoteTransfer $quoteTransfer
    ): ?HeidelpayCreditCardRegistrationTransfer {
        $findRegistrationRequestTransfer = $this->buildFindRegistrationRequestTransfer($idRegistration, $quoteTransfer);

        return $this->getFactory()
            ->createZedStub()
            ->findCreditCardRegistrationByIdAndQuote($findRegistrationRequestTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer $directDebitRegistrationTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer
     */
    public function retrieveDirectDebitRegistration(
        HeidelpayDirectDebitRegistrationTransfer $directDebitRegistrationTransfer
    ): HeidelpayDirectDebitRegistrationTransfer {
        return $this->getFactory()
            ->createZedStub()
            ->retrieveDirectDebitRegistration($directDebitRegistrationTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayCreditCardPaymentOptionsTransfer
     */
    public function getCreditCardPaymentOptions(QuoteTransfer $quoteTransfer): HeidelpayCreditCardPaymentOptionsTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->getCreditCardPaymentOptions($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitPaymentOptionsTransfer
     */
    public function getDirectDebitPaymentOptions(QuoteTransfer $quoteTransfer): HeidelpayDirectDebitPaymentOptionsTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->getDirectDebitPaymentOptions($quoteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\HeidelpayNotificationTransfer $notificationTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayNotificationTransfer
     */
    public function processNotification(HeidelpayNotificationTransfer $notificationTransfer): HeidelpayNotificationTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->processNotification($notificationTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $responseArray
     *
     * @return array
     */
    public function filterResponseParameters(array $responseArray): array
    {
        return array_filter($responseArray, function ($key) {
            return !preg_match('/^paymentForm+|^lang+/', $key);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * @return string
     */
    protected function getCurrentLocale(): string
    {
        return $this->getFactory()
            ->getLocaleClient()
            ->getCurrentLocale();
    }

    /**
     * @param array $externalResponse
     *
     * @return \Generated\Shared\Transfer\HeidelpayExternalPaymentRequestTransfer
     */
    protected function buildTransferFromExternalResponseArray(
        array $externalResponse
    ): HeidelpayExternalPaymentRequestTransfer {
        return (new HeidelpayExternalPaymentRequestTransfer())
            ->setBody($externalResponse);
    }

    /**
     * @param int $idRegistration
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\HeidelpayRegistrationByIdAndQuoteRequestTransfer
     */
    protected function buildFindRegistrationRequestTransfer(
        int $idRegistration,
        QuoteTransfer $quoteTransfer
    ): HeidelpayRegistrationByIdAndQuoteRequestTransfer {
        return (new HeidelpayRegistrationByIdAndQuoteRequestTransfer())
            ->setIdRegistration($idRegistration)
            ->setQuote($quoteTransfer);
    }
}
