<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('test my page CV');
        $I->amOnPage('/');
        $I->see('AllardNathanael');
    }
}
