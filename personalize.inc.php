<?php
/* Personalize Snippet for Revolution */

/* ::::::::::::::::::::::::::::::::::::::::
 * Snippet Name: Personalize
 * Short Desc: returns a chunk if the user is logged in, otherwise calls another
 * Version: 3.1
 * Created By: 	Ryan Thrash (modx@vertexworks.com), and then
 * powered up by kudo (kudo@kudolink.com), and then
 * updated to work with 0.9.6 by breezer
 * MODx Revolution version by Bob Ray
 *
 * Date: Aug 03, 2006
 *
 * Changelog:
 * Dec 01, 05 -- initial release
 * Jun 19, 06 -- updated description
 * Jul 19, 06 -- hacked by kudo to output chunks
 * Aug 03, 06 -- added placeholder for username
 * Aug 06, 07 -- renamed to LoggedOrNot as its more fitting, it also matches the example
 * Aug 06, 07 -- replaced 2.0 code with modified version found here
 * Sept 26, 10 -- MODx Revolution version
 *::::::::::::::::::::::::::::::::::::::::
 * Description:
 * Checks to see if webusers are logged in and displays yesChunk if the user
 * is logged or noChunk if user is not logged. Insert only the chunk name as
 * param, without {{}}. Can use a placeholder to output the username.
 *
 * TESTED: can be used more than once per page.
 * TESTED: chunks can contain snippets.
 *
 *
 * Params:
 *    &yesChunk [string] [REQUIRED]
 *        Output for LOGGED users
 *
 *    &noChunk [string] [REQUIRED]
 *        Output for NOT logged users
 *
 *    &ph [string] (optional)
 *    Placeholder for placing the username
 *    ATTENTION!: ph placeholder will *not* be set in noChunk!
 *
 *    &fullName [`0` or `1`] (optional)
 *    Use full name instead of username in placeholder
 *
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