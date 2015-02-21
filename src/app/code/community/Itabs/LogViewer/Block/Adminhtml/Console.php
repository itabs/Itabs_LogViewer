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
 * Class Itabs_LogViewer_Block_Adminhtml_Console
 */
class Itabs_LogViewer_Block_Adminhtml_Console extends Mage_Adminhtml_Block_Widget_Container
{
    /**
     * Constructor for Block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('itabs/logviewer/console.phtml');

        // Add the buttons to the layout
        if ($this->getLogHelper()->getCurrentFile()) {
            // Add reload button
            $this->_addButton('reload', array(
                'label'   => $this->getLogHelper()->__('Reload'),
                'onclick' => 'setLocation(\'' . $this->getUrl('*/*/*', array('_current' => true)) . '\')'
            ), -1);

            // Add download button
            $this->_addButton('download', array(
                'label'   => $this->getLogHelper()->__('Download Log File'),
                'onclick' => 'setLocation(\'' . $this->getUrl('*/*/download', array('_current' => true)) . '\')',
                'class'   => 'add'
            ));
        }
    }

    /**
     * Retrieve the log output
     *
     * @return string
     */
    public function getLogOutput()
    {
        $lines = '';

        $file = $this->getLogHelper()->getCurrentFile();
        if ($file) {
            $path = $this->getLogHelper()->getLogDir() . $file;

            /* @var $reader Itabs_LogViewer_Model_Reader */
            $reader = Mage::getModel('itabs_logviewer/reader');
            $tmpLines = $reader->readLastLines($path, $this->getLogHelper()->getCurrentLines());
            if (count($tmpLines) > 0) {
                $lines = implode('<br />', $tmpLines);
            }
        }

        return $lines;
    }

    /**
     * Retrieve the log viewer helper
     *
     * @return Itabs_LogViewer_Helper_Data
     */
    public function getLogHelper()
    {
        return Mage::helper('itabs_logviewer');
    }
}
