<?php

declare(strict_types=1);
// Path to run ./vendor/bin/phpunit --bootstrap vendor/autoload.php FileName.php
// Butuh Framework PHPUnit
use PHPUnit\Framework\TestCase;

require_once $GLOBALS['SEMEDIR']->kero_sine.'SENE_Sql.php';
require_once $GLOBALS['SEMEDIR']->kero_sine.'SENE_Sql_Select.php';
require_once $GLOBALS['SEMEDIR']->kero_sine.'SENE_MySQLi_Engine.php';
require_once $GLOBALS['SEMEDIR']->kero_sine.'SENE_Model.php';

class SENE_SQL_Select_Mock extends SENE_SQL_Select
{
    public $query_string;
    
    public function __construct()
    {
        parent::__construct();
    }
}

#[UsesClass('SENE_Sql_Select_Mock')]
#[CoversClass('SENE_Sql')]
#[CoversClass('SENE_Sql_Select')]
final class SENE_Sql_Select_Test extends TestCase
{

    /**
     * 
     * 
     */
    public function testQueryStringNeedReturnString()
    {
        $sql = new SENE_Sql_Select_Mock();
        $this->assertEquals('', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testResetQueryStringNeedReturnString()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->reset();
        $this->assertEquals('', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectMethodIfEmtpty()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select();
        $this->assertEquals('*', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectMethodIfWildCard()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select('*');
        $this->assertEquals('*', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectMethodIfArray()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select(['id', 'name']);
        $this->assertEquals('id, name', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectMethodIfString()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select('id');
        $this->assertEquals('id', $sql->query_string());
    }
    

    /**
     * 
     * 
     */
    public function testSelectAsMethodIfEmtpty()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select_as();
        $this->assertEquals('*', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectAsMethodIfWildCard()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select_as('*');
        $this->assertEquals('*', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectAsMethodIfArray()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select_as(['id', 'name']);
        $this->assertEquals('id, name', $sql->query_string());
    }

    /**
     * 
     * 
     */
    public function testSelectAsMethodIfString()
    {
        $sql = new SENE_Sql_Select_Mock();
        $sql->select_as('id');
        $this->assertEquals('id', $sql->query_string());
    }
}