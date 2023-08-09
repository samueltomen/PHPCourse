<pre>



<?php

class Wallet
{
    function __construct(public int $amount)
    {
    }
}

class User
{
    private string $fullName;
    private bool $isAdmin;
    public Wallet $wallet;

    function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    function getWallet(): Wallet
    {
        return $this->wallet;
    }
    function setWallet(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }
}

$user = new User('');

$user->setWallet(new Wallet(500));

echo $user->wallet->amount;

?>
</pre>