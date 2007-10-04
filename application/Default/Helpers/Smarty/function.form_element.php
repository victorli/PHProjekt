<?php
/**
 * Smarty plugin
 *
 * LICENSE: Licensed under the terms of the PHProjekt 6 License
 *
 * @copyright  2007 Mayflower GmbH (http://www.mayflower.de)
 * @package    PHProjekt
 * @license    http://phprojekt.com/license PHProjekt 6 License
 * @version    CVS: $Id$
 * @link       http://www.phprojekt.com
 * @author     David Soria Parra <soria_parra@mayflower.de>
 * @since      File available since Release 1.0
 */


/**
 * Generate a form elements from a field object
 *
 * @param array $arguments
 *
 * @return array
 */
function smarty_function_form_element($arguments)
{
    if (array_key_exists('field', $arguments)
     && $arguments['fields'] instanceof Phprojekt_DatabaseManager_Field ) {
        return Default_Helpers_FormView::generateFormElement($arguments['field']);
    }

    return '';
}