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
 *    @property yesChunk string (REQUIRED) Name of chunk to
 *        show for LOGGED-in users
 *
 *    @property noChunk string (REQUIRED) Name of chunk to
 *        show for NOT logged-in users
 *
 *    @property ph string (optional) Placeholder for placing
 *        the username
 *        ATTENTION!: ph placeholder will *not* be set in noChunk!
 *
 *    @property fullName boolean (optional) Use full name
 *        instead of username in placeholder
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
 * Placeholder [[+name]] will show the user's name in the yesChunk.
 *
 * Create Chunks named HelloUser and Register, the first will be
 * shown to a user logged on in the current context,
 * the second to other users.
 *
 *:::::::::::::::::::::::::::::::::::::::: */

/* Prepare params and variables */
$output = '';
$yesChunk = (isset($yesChunk))? $yesChunk : '';
$noChunk = (isset($noChunk))? $noChunk : '';

/* Do the work */
 if ($modx->user->hasSessionContext($modx->context->get('key')) ) {
   $output =  $modx->getChunk($yesChunk);
   if (isset($ph)) {
      if ($fullName) {
          $profile = $modx->user->getOne('Profile');
          $modx->setPlaceholder($ph, $profile->get('fullname'));
      } else {
          $modx->setPlaceholder($ph, $modx->user->get('username'));
      }
   }
} else {
   $output = $modx->getChunk($noChunk);
}

return $output;