<?php
/**
 * PHProjekt Extension API
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 3 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * @category   PHProjekt
 * @package    Phprojekt
 * @subpackage Core
 * @copyright  Copyright (c) 2010 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL v3 (See LICENSE file)
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.1
 * @version    Release: @package_version@
 * @author     David Soria Parra <david.soria_parra@mayflower.de>
 */

/**
 * Phprojekt Class for initialize the Zend Framework.
 *
 * @category   PHProjekt
 * @package    Phprojekt
 * @subpackage Core
 * @copyright  Copyright (c) 2010 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL v3 (See LICENSE file)
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.1
 * @version    Release: @package_version@
 * @author     David Soria Parra <david.soria_parra@mayflower.de>
 */
abstract class PHProjekt_Extension_Abstract
{
    /**
     * Initializatin method.
     *
     * This method is called during Phprojekt request startup.
     * It is safe to assume other extension are loaded to check for
     * their existance. It is not safe to use __construct for
     * this purpose.
     */
    public function init()
    {
    }

    /**
     * Return the current version of the extension.
     *
     * Must have the format X.Y.Z. E.g: 1.0.0.
     * Other version schemas are not allowed.
     *
     * @return string
     */
    public abstract function getVersion();
}
