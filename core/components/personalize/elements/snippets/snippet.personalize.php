<?php

/**
 * Personalize snippet for MODx Revolution
 *
 * Personalize is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * Personalize is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Personalize; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package personalize
 */
/**
 * MODx Personalize Snippet
 *
 *
 * @package personalize
 *
 * Properties
 *
 *    @property yesChunk string (REQUIRED) Name of chunk or
 *        inline chunk to show for LOGGED-in users
 *
 *    @property noChunk string (optional) Name of chunk or
 *        inline chunk to show for NOT logged-in users
 *
 *    @property ph string (optional) Placeholder for placing
 *        the username
 *        ATTENTION!: ph placeholder will *not* be set in noChunk!
 *
 *    @property fullName boolean (optional) Use full name
 *        instead of username in placeholder
 *
 *    @property ifIds string (optional) comma separated 
 *        list of users ids
 *
 */
/* Personalize Snippet for Revolution */

/* ::::::::::::::::::::::::::::::::::::::::
 * Snippet Name: Personalize
 * Short Desc: returns a chunk if the user is logged in, otherwise calls another
 *::::::::::::::::::::::::::::::::::::::::
 * Description:
 * Checks to see if users are logged in and displays yesChunk if the user
 * is logged or noChunk if user is not logged. Insert only the chunk name as
 * param, without any tags. Can use a placeholder to output the username.
 *
 * TESTED: can be used more than once per page.
 * TESTED: chunks can contain snippets.
 *
 * Example Usage:
 *
 *    [[!Personalize?
 *        &yesChunk=`HelloUser`
 *         &noChunk=`Register`
 *         &ph=`name`
 *     ]]
 *
 * ADDED in 3.3.1:
 *    
 *    1. &noChunk=`@CODE:<b>Please login!</b>` - inline snippets
 *    2. &ifIds=`1,3` - additional check for users ids
 *    
 *    
 * Placeholder [[+name]] will show the user's name in the yesChunk.
 *
 * Create Chunks named HelloUser and Register, the first will be
 * shown to a user logged on in the current context,
 * the second to other users.
 *
 *:::::::::::::::::::::::::::::::::::::::: */
/* @var $modx modX */
/* @var $profile modUserProfile */

/* Prepare params and variables */
$output = '';
$sp =& $scriptProperties;

$yesChunk = $modx->getOption('yesChunk',$sp, null);
$noChunk = $modx->getOption('noChunk',$scriptProperties, null);
$fullName = $modx->getOption('fullName', $sp, null);
$ph = $modx->getOption('ph',$sp, null);
$ifIds = $modx->getOption('ifIds',$sp, null);

if( !empty ($fullName) ) {
    $profile = $modx->user->getOne('Profile');
}
$ifIds = empty($ifIds)? array_map('trim',explode(',',$ifIds)) : false;

/* Do the work */
if ($modx->user->hasSessionContext($modx->context->get('key')) && ( $ifIds == false  || in_array($modx->user->get('id'), $ifIds)) ) {
	if (preg_match('/^@CODE:/',$yesChunk)) {
		$output =  substr($yesChunk, 6);
	} else {
		$output =  $modx->getChunk($yesChunk, $scriptProperties);
	}
	if (! empty($ph)) {
		if ($fullName && $profile) {
			$modx->setPlaceholder($ph, $profile->get('fullname'));
		} else {
			$modx->setPlaceholder($ph, $modx->user->get('username'));
		}
	}
} elseif( !empty ($noChunk) ) {
	if (preg_match('/^@CODE:/',$noChunk)) {
		$output =  substr($noChunk, 6);
	} else {
		$output =  $modx->getChunk($noChunk);
	}
}
return empty($output)? '': $output;