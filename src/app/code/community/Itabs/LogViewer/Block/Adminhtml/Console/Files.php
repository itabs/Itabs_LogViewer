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
 * Class Itabs_LogViewer_Block_Adminhtml_Console_Files
 */
class Itabs_LogViewer_Block_Adminhtml_Console_Files
    extends Mage_Adminhtml_Block_Template
{
    /**
     * Constructor for Block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('itabs/logviewer/console/files.phtml');
    }

    /**
     * Returns the log files of the var/log directory
     *
     * @return array
     */
    public function getLogFiles()
    {
        $path = $this->getLogHelper()->getLogDir();
        if (!file_exists($path)) {
            return array();
        }

        $io = new Varien_Io_File();
        $io->open(array('path' => $path));
        $files = $io->ls(Varien_Io_File::GREP_FILES);

        return $files;
    }

    /**
     * Retrieve the available lines count
     *
     * @return array
     */
    public function getAvailableLines()
    {
        /* @var $source Itabs_LogViewer_Model_Config_Source_Lines */
        $source = Mage::getModel('itabs_logviewer/config_source_lines');

        return $source->toOptionHash();
    }

    /**
     * Adds the secure key to the url
     *
     * @return string
     */
    public function getSecureUrl($fileName = null, $lines = false)
    {
        $params = array();
        if (!is_null($fileName)) {
            $params['file'] = $this->getLogHelper()->encode($fileName);
        }

        if ($lines) {
            $params['lines'] = $lines;
        }

        return $this->getUrl('*/*/*', $params);
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
