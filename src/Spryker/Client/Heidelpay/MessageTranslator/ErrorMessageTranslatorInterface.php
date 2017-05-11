<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Heidelpay\MessageTranslator;

/**
 * @method \Spryker\Client\Heidelpay\HeidelpayFactory getFactory()
 */
interface ErrorMessageTranslatorInterface
{

    /**
     * @param string $errorCode
     * @param string $locale
     *
     * @return string
     */
    public function getTranslatedErrorMessageByCode($errorCode, $locale);

}
