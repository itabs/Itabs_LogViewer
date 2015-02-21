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
 * Tests for module config
 *
 * @group Itabs_LogViewer
 */
class Itabs_LogViewer_Test_Config_Config extends EcomDev_PHPUnit_Test_Case_Config
{
    /**
     * @test
     * @loadExpections
     */
    public function globalConfig()
    {
        $this->assertModuleVersion($this->expected('module')->getVersion());
        $this->assertModuleCodePool($this->expected('module')->getCodePool());

        foreach ($this->expected('module')->getDepends() as $depend) {
            $this->assertModuleDepends($depend);
        }
    }
}
