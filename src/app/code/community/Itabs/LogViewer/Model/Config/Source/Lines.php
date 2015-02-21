<?php
/**
 * This file is part of the Itabs_LogViewer module.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 5
 *
 * @category  Itabs
 * @package   Itabs_LogViewer
 * @author    ITABS GmbH <info@itabs.de>
 * @copyright 2015 ITABS GmbH (http://www.itabs.de)
 */

/**
 * Class Itabs_LogViewer_Model_Config_Source_Lines
 */
class Itabs_LogViewer_Model_Config_Source_Lines
{
    /**
     * @var null
     */
    protected $_options = null;

    /**
     * Retrieve the option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (null === $this->_options) {
            $this->_options = array(
                array(
                    'value' => 50,
                    'label' => $this->getHelper()->__('%s lines', 50),
                ),
                array(
                    'value' => 100,
                    'label' => $this->getHelper()->__('%s lines', 100),
                ),
                array(
                    'value' => 250,
                    'label' => $this->getHelper()->__('%s lines', 250),
                ),
                array(
                    'value' => 500,
                    'label' => $this->getHelper()->__('%s lines', 500),
                ),
                array(
                    'value' => 1000,
                    'label' => $this->getHelper()->__('%s lines', 1000),
                )
            );
        }

        return $this->_options;
    }

    /**
     * Retrieve the option hash
     *
     * @return array
     */
    public function toOptionHash()
    {
        $options = array();
        foreach ($this->toOptionArray() as $option) {
            $options[$option['value']] = $option['label'];
        }

        return $options;
    }

    /**
     * Retrieve the log viewer helper
     *
     * @return Itabs_LogViewer_Helper_Data
     */
    public function getHelper()
    {
        return Mage::helper('itabs_logviewer');
    }
}
