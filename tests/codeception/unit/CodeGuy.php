<?php //[STAMP] 9c93a410c802dd9d3f8941308352dcd2

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile


use Codeception\Module\Db;
use Codeception\Module\CodeHelper;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void haveFriend($name)
*/
class CodeGuy extends \Codeception\Actor
{
   
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Inserts SQL record into database. This record will be erased after the test.
     *
     * ``` php
     * <?php
     * $I->haveInDatabase('users', array('name' => 'miles', 'email' => 'miles@davis.com'));
     * ?>
     * ```
     *
     * @param $table
     * @param array $data
     * @return integer $id
     * @see \Codeception\Module\Db::haveInDatabase()
     */
    public function haveInDatabase($table, $data) {
        return $this->scenario->runStep(new \Codeception\Step\Action('haveInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if a row with given column values exists.
     * Provide table name and column values.
     *
     * Example:
     *
     * ``` php
     * <?php
     * $I->seeInDatabase('users', array('name' => 'Davert', 'email' => 'davert@mail.com'));
     *
     * ```
     * Will generate:
     *
     * ``` sql
     * SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert@mail.com'
     * ```
     * Fails if no such user found.
     *
     * @param       $table
     * @param array $criteria
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Db::seeInDatabase()
     */
    public function canSeeInDatabase($table, $criteria = null) {
        return $this->scenario->runStep(new \Codeception\Step\ConditionalAssertion('seeInDatabase', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if a row with given column values exists.
     * Provide table name and column values.
     *
     * Example:
     *
     * ``` php
     * <?php
     * $I->seeInDatabase('users', array('name' => 'Davert', 'email' => 'davert@mail.com'));
     *
     * ```
     * Will generate:
     *
     * ``` sql
     * SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert@mail.com'
     * ```
     * Fails if no such user found.
     *
     * @param       $table
     * @param array $criteria
     * @see \Codeception\Module\Db::seeInDatabase()
     */
    public function seeInDatabase($table, $criteria = null) {
        return $this->scenario->runStep(new \Codeception\Step\Assertion('seeInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Effect is opposite to ->seeInDatabase
     *
     * Checks if there is no record with such column values in database.
     * Provide table name and column values.
     *
     * Example:
     *
     * ``` php
     * <?php
     * $I->dontSeeInDatabase('users', array('name' => 'Davert', 'email' => 'davert@mail.com'));
     *
     * ```
     * Will generate:
     *
     * ``` sql
     * SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert@mail.com'
     * ```
     * Fails if such user was found.
     *
     * @param       $table
     * @param array $criteria
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Db::dontSeeInDatabase()
     */
    public function cantSeeInDatabase($table, $criteria = null) {
        return $this->scenario->runStep(new \Codeception\Step\ConditionalAssertion('dontSeeInDatabase', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Effect is opposite to ->seeInDatabase
     *
     * Checks if there is no record with such column values in database.
     * Provide table name and column values.
     *
     * Example:
     *
     * ``` php
     * <?php
     * $I->dontSeeInDatabase('users', array('name' => 'Davert', 'email' => 'davert@mail.com'));
     *
     * ```
     * Will generate:
     *
     * ``` sql
     * SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert@mail.com'
     * ```
     * Fails if such user was found.
     *
     * @param       $table
     * @param array $criteria
     * @see \Codeception\Module\Db::dontSeeInDatabase()
     */
    public function dontSeeInDatabase($table, $criteria = null) {
        return $this->scenario->runStep(new \Codeception\Step\Assertion('dontSeeInDatabase', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Fetches a single column value from a database.
     * Provide table name, desired column and criteria.
     *
     * Example:
     *
     * ``` php
     * <?php
     * $mail = $I->grabFromDatabase('users', 'email', array('name' => 'Davert'));
     *
     * ```
     *
     * @version 1.1
     *
     * @param       $table
     * @param       $column
     * @param array $criteria
     *
     * @return mixed
     * @see \Codeception\Module\Db::grabFromDatabase()
     */
    public function grabFromDatabase($table, $column, $criteria = null) {
        return $this->scenario->runStep(new \Codeception\Step\Action('grabFromDatabase', func_get_args()));
    }
}
