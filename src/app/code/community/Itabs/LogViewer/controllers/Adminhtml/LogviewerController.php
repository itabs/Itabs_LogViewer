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
 * Class Itabs_LogViewer_Adminhtml_LogviewerController
 */
class Itabs_LogViewer_Adminhtml_LogviewerController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Show the log file viewer
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('system/logviewer');
        $this->_title($this->__('Log Viewer'));
        $this->renderLayout();
    }

    /**
     * Download the given log file
     */
    public function downloadAction()
    {
        $file = $this->getLogHelper()->getCurrentFile();
        if ($file) {
            $path = $this->getLogHelper()->getLogDir() . $file;
            $this->_prepareDownloadResponse($file, file_get_contents($path));

            return;
        }

        return $this->_redirect('*/*');
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
