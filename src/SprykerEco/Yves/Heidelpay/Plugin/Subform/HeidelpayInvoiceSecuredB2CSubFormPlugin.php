<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Yves\Heidelpay\Plugin\Subform;

use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;
use Spryker\Yves\StepEngine\Dependency\Form\SubFormInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginInterface;

/**
 * @method \SprykerEco\Yves\Heidelpay\HeidelpayFactory getFactory()
 */
class HeidelpayInvoiceSecuredB2CSubFormPlugin extends AbstractPlugin implements SubFormPluginInterface
{
    /**
     * {@inheritdoc}
     *  - Creates sub form for InvoiceSecuredB2C payment method.
     *
     * @api
     *
     * @return \Spryker\Yves\StepEngine\Dependency\Form\SubFormInterface
     */
    public function createSubForm(): SubFormInterface
    {
        return $this->getFactory()->createInvoiceSecuredB2CSubForm();
    }

    /**
     * {@inheritdoc}
     *  - Creates data provider for InvoiceSecuredB2C payment method.
     *
     * @api
     *
     * @return \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface
     */
    public function createSubFormDataProvider(): StepEngineFormDataProviderInterface
    {
        return $this->getFactory()->createInvoiceSecuredB2CDataProvider();
    }
}
