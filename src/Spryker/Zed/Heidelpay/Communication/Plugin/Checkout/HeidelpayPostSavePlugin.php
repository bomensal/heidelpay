<?php
/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace Spryker\Zed\Heidelpay\Communication\Plugin\Checkout;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin as BaseAbstractPlugin;
use Spryker\Zed\Payment\Dependency\Plugin\Checkout\CheckoutPostCheckPluginInterface;

/**
 * @method \Spryker\Zed\Heidelpay\Business\HeidelpayFacade getFacade()
 * @method \Spryker\Zed\Heidelpay\Business\HeidelpayBusinessFactory getFactory()
 */
class HeidelpayPostSavePlugin extends BaseAbstractPlugin implements CheckoutPostCheckPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return void
     */
    public function execute(QuoteTransfer $quoteTransfer, CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        $this->getFacade()->postSaveHook($quoteTransfer, $checkoutResponseTransfer);
    }

}
