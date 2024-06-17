<?php

/**
 * Default properties for the Personalize snippet
 * @author Bob Ray
 * @copyright 2015-2024 Bob Ray
 * @created 1/15/11
 *
 * @package personalize
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
    array(
        'name' => 'firstName',
        'desc' => 'personalize_firstname_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '0',
        'lexicon' => 'personalize:properties',
    ),
    array(
            'name' => 'ifIds',
            'desc' => 'personalize_ifIds_desc',
            'type' => 'textfield',
            'options' => '',
            'value' => '',
            'lexicon' => 'personalize:properties',
        ),
);

return $properties;
