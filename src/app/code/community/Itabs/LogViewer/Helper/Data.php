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
 * Class Itabs_LogViewer_Helper_Data
 */
class Itabs_LogViewer_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieve the current file
     *
     * @return string|bool
     */
    public function getCurrentFile()
    {
        $file = Mage::app()->getRequest()->getParam('file', false);
        if ($file) {
            $file = $this->decode($file);

            // Check if file exists
            $path = $this->getLogDir() . $file;
            if (!file_exists($path)) {
                return false;
            }
        }

        return $file;
    }

    /**
     * Retrieve the current lines count
     *
     * @return int
     */
    public function getCurrentLines()
    {
        return Mage::app()->getRequest()->getParam('lines', 100);
    }

    /**
     * Encode the given string for the url
     *
     * @param  string $string String
     * @return string
     */
    public function encode($string)
    {
        return strtr(base64_encode($string), '+/=', '-_,');
    }

    /**
     * Decode the given string from the url
     *
     * @param  string $string String
     * @return string
     */
    public function decode($string)
    {
        return base64_decode(strtr($string, '-_,', '+/='));
    }

    /**
     * Retrieve the log dir
     *
     * @return string
     */
    public function getLogDir()
    {
        return Mage::getBaseDir('var') . DS . 'log' . DS;
    }
}
