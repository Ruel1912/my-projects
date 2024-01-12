<?php

namespace common\Robokassa;

use Lexty\Robokassa\Auth;
use Lexty\Robokassa\Payment;

class Robokassa
{
    private Payment $payment;
    public function __construct(string $login, string $password1, string $password2)
    {

        $this->payment = new Payment(
            new Auth($login, $password1, $password2, true)
        );
        $this->payment->setCulture(Payment::CULTURE_RU);
    }
    public function setInvoiceId($orderId): Robokassa
    {
        $this->payment->setInvoiceId($orderId);
        return $this;
    }
    public function setSum($orderAmount): Robokassa
    {
        $this->payment->setSum($orderAmount);
        return $this;
    }
    public function setDescription($description)
    {
        $this->payment->setDescription($description);
        return $this;
    }
    public function redirect()
    {
        header("Location: {$this->payment->getPaymentUrl()}");
    }
}