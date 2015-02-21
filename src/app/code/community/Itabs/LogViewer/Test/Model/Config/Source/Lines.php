<?php

class Itabs_LogViewer_Test_Model_Config_Source_Lines extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var Itabs_LogViewer_Model_Config_Source_Lines
     */
    protected $_model;

    /**
     * Set up test class
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('itabs_logviewer/config_source_lines');
    }

    /**
     * @test
     * @loadExpectations
     */
    public function toOptionArray()
    {
        $this->assertEquals(
            $this->expected('source')->getOptions(),
            $this->_model->toOptionArray()
        );
    }

    /**
     * @test
     * @loadExpectations
     */
    public function toOptionHash()
    {
        $this->assertEquals(
            $this->expected('source')->getOptions(),
            $this->_model->toOptionHash()
        );
    }
}
