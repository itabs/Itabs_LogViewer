<?php

class Itabs_LogViewer_Test_Helper_Data extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var Itabs_LogViewer_Helper_Data
     */
    protected $_helper;

    /**
     * Set up test class
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_helper = Mage::helper('itabs_logviewer');
    }

    /**
     * @test
     */
    public function getCurrentLines()
    {
        $this->assertEquals(100, $this->_helper->getCurrentLines());
        self::app()->getRequest()->setParam('lines', 500);
        $this->assertEquals(500, $this->_helper->getCurrentLines());
    }

    /**
     * @test
     */
    public function encode()
    {
        $this->assertEquals('dGVzdA,,', $this->_helper->encode('test'));
    }

    /**
     * @test
     */
    public function decode()
    {
        $this->assertEquals('test', $this->_helper->decode('dGVzdA,,'));
    }
}
