<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "geo_location_service".
 *
 * Auto generated 27-09-2016 12:04
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Geo Location Service',
    'description' => 'Get latitude and longitude for an address per google api call',
    'category' => 'be',
    'author' => 'Erik Rauchstein',
    'author_email' => 'erik.rauchstein@cps-it.de',
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'author_company' => '',
    'version' => '0.4.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'suggests' => [
            'pagenotfoundhandling' => '',
        ],
    ],
];

