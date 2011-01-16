<?php

/**
 * Default properties for the QuickEmail snippet
 * @author Bob Ray
 * 1/15/11
 *
 * @package quickemail
 * @subpackage build
 */


$properties = array(
    array(
        'name' => 'yesChunk',
        'desc' => 'personalize_yeschunk_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'personalize:properties',
    ),
    array(
        'name' => 'noChunk',
        'desc' => 'personalize_nochunk_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'personalize:properties',
    ),
    array(
        'name' => 'ph',
        'desc' => 'personalize_ph_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'personalize:properties',
    ),
    array(
        'name' => 'fullName',
        'desc' => 'personalize_fullname_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '0',
        'lexicon' => 'personalize:properties',
    ),
);

return $properties;