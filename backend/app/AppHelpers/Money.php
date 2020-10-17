<?php


namespace App\AppHelpers;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

class Money
{
    private $money;

    /**
     * Money constructor.
     */
    public function __construct($price)
    {
        $this->money = new \Money\Money($price, new Currency(env('CURRENCY', 'USD')));
    }

    public function amount()
    {
        return $this->money->getAmount();
    }

    public function formatted()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_US', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );
        return $formatter->format($this->money);
    }
}
