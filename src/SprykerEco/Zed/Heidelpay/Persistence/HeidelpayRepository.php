<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\Heidelpay\Persistence;

use Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer;
use Orm\Zed\Heidelpay\Persistence\SpyPaymentHeidelpayDirectDebitRegistrationQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;
use SprykerEco\Zed\Heidelpay\Persistence\Propel\Mapper\HeidelpayPersistenceMapper;

/**
 * @method \SprykerEco\Zed\Heidelpay\Persistence\HeidelpayPersistenceFactory getFactory()
 */
class HeidelpayRepository extends AbstractRepository implements HeidelpayRepositoryInterface
{
    /**
     * @param string $registrationUniqueId
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer|null
     */
    public function findHeidelpayDirectDebitRegistrationByRegistrationUniqueId(
        string $registrationUniqueId
    ): ?HeidelpayDirectDebitRegistrationTransfer {
        $paymentHeidelpayDirectDebitRegistrationEntity = $this->getPaymentHeidelpayDirectDebitRegistrationQuery()
            ->filterByRegistrationUniqueId($registrationUniqueId)
            ->findOne();

        if ($paymentHeidelpayDirectDebitRegistrationEntity === null) {
            return null;
        }

        return $this->getMapper()
            ->mapEntityToHeidelpayDirectDebitRegistrationTransfer(
                $paymentHeidelpayDirectDebitRegistrationEntity,
                new HeidelpayDirectDebitRegistrationTransfer()
            );
    }

    /**
     * @param int $idCustomerAddress
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer|null
     */
    public function findLastHeidelpayDirectDebitRegistrationByIdCustomerAddress(
        int $idCustomerAddress
    ): ?HeidelpayDirectDebitRegistrationTransfer {
        $paymentHeidelpayDirectDebitRegistrationEntity = $this->getPaymentHeidelpayDirectDebitRegistrationQuery()
            ->filterByFkCustomerAddress($idCustomerAddress)
            ->orderByIdDirectDebitRegistration(Criteria::DESC)
            ->findOne();

        if ($paymentHeidelpayDirectDebitRegistrationEntity === null) {
            return null;
        }

        return $this->getMapper()
            ->mapEntityToHeidelpayDirectDebitRegistrationTransfer(
                $paymentHeidelpayDirectDebitRegistrationEntity,
                new HeidelpayDirectDebitRegistrationTransfer()
            );
    }

    /**
     * @param int $idRegistration
     * @param string $transactionId
     *
     * @return \Generated\Shared\Transfer\HeidelpayDirectDebitRegistrationTransfer|null
     */
    public function findHeidelpayDirectDebitRegistrationByIdAndTransactionId(
        int $idRegistration,
        string $transactionId
    ): ?HeidelpayDirectDebitRegistrationTransfer {
        $paymentHeidelpayDirectDebitRegistrationEntity = $this->getPaymentHeidelpayDirectDebitRegistrationQuery()
            ->filterByIdDirectDebitRegistration($idRegistration)
            ->filterByTransactionId($transactionId)
            ->findOne();

        if ($paymentHeidelpayDirectDebitRegistrationEntity === null) {
            return null;
        }

        return $this->getMapper()
            ->mapEntityToHeidelpayDirectDebitRegistrationTransfer(
                $paymentHeidelpayDirectDebitRegistrationEntity,
                new HeidelpayDirectDebitRegistrationTransfer()
            );
    }

    /**
     * @return \SprykerEco\Zed\Heidelpay\Persistence\Propel\Mapper\HeidelpayPersistenceMapper
     */
    protected function getMapper(): HeidelpayPersistenceMapper
    {
        return $this->getFactory()->createHeidelpayPersistenceMapper();
    }

    /**
     * @return \Orm\Zed\Heidelpay\Persistence\SpyPaymentHeidelpayDirectDebitRegistrationQuery
     */
    protected function getPaymentHeidelpayDirectDebitRegistrationQuery(): SpyPaymentHeidelpayDirectDebitRegistrationQuery
    {
        return $this->getFactory()->createPaymentHeidelpayDirectDebitRegistrationQuery();
    }
}
