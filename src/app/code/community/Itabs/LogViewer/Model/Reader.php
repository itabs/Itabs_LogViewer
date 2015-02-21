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
 * Class Itabs_LogViewer_Model_Reader
 */
class Itabs_LogViewer_Model_Reader
{
    /**
     * Return array with last n lines from given file
     *
     * @param  string|resource file   File
     * @param  int             $lines Number of lines
     * @return array
     */
    public function readLastLines($file, $lines)
    {
        if (!file_exists($file)) {
            return false;
        }

        $handle = fopen($file, 'r');
        if ($handle === false) {
            return false;
        }

        // Move the pointer first to the end
        fseek($handle, 0, SEEK_END);

        // Move the pointer to the lines we want to retrieve
        $this->_seekLineBack($handle, $lines);

        // Fetch all lines based from this pointer
        $lines = array();
        while ($line = fgets($handle)) {
            $lines[] = $line;
        }

        fclose($handle);

        return $lines;
    }

    /**
     * Will set pointer in file back to read n lines relative to current pointer
     *
     * @param  resource $handle Resource
     * @param  int      $lines  Number of lines
     * @return int
     * @see http://stackoverflow.com/a/13936967/2088060
     */
    protected function _seekLineBack($handle, $lines)
    {
        $readSize = 160 * ($lines + 1);
        $pos = ftell($handle);
        if (ftell($handle) === 0) {
            return false;
        }
        if ($pos === false) {
            fseek($handle, 0, SEEK_SET);

            return false;
        }
        while ($lines >= 0) {
            if ($pos === 0) {
                break;
            }
            $currentReadsize = $readSize;
            $pos = $pos - $readSize;
            if ($pos < 0) {
                $currentReadsize = $readSize - abs($pos);
                $pos = 0;
            }
            if (fseek($handle, $pos, SEEK_SET) === -1) {
                fseek($handle, 0, SEEK_SET);
                break;
            }
            $data = fread($handle, $currentReadsize);
            $count = substr_count($data, "\n");
            $lines = $lines - $count;
            if ($lines < 0) {
                break;
            }
        }
        fseek($handle, $pos, SEEK_SET);
        while ($lines < 0) {
            fgets($handle);
            $lines++;
        }
        $pos = ftell($handle);
        if ($pos === false) {
            fseek($handle, 0, SEEK_SET);
        }

        return $pos;
    }
}
