<?php
/**
 * Snippet object array for QuickEmail package
 * @author Bob Ray
 * 1/15/11
 *
 * @package quickemail
 * @subpackage build
 */


function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = str_replace('<?php','',$o);
    $o = str_replace('?>','',$o);
    $o = trim($o);
    return $o;
}
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'Personalize',
    'description' => 'Snippet to show different chunks to logged-in- and not-logged-in users.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.personalize.php'),
),'',true,true);
$properties = include $sources['data'].'properties.personalize.php';
$snippets[0]->setProperties($properties);
unset($properties);


return $snippets;