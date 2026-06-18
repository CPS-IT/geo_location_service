<?php

use CPSIT\GeoLocationService\Cache\GeoLocationCache;
use TYPO3\CMS\Core\Cache\Backend\Typo3DatabaseBackend;

defined('TYPO3') || die();

// Register geo location cache
(function (): void {
    $cacheConfigurations = &$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'];

    if (!isset($cacheConfigurations[GeoLocationCache::NAME])) {
        $cacheConfigurations[GeoLocationCache::NAME] = [];
    }
    if (!isset($cacheConfigurations[GeoLocationCache::NAME]['backend'])) {
        $cacheConfigurations[GeoLocationCache::NAME]['backend']
            = Typo3DatabaseBackend::class;
    }
    if (!isset($cacheConfigurations[GeoLocationCache::NAME]['options'])) {
        $cacheConfigurations[GeoLocationCache::NAME]['options'] = [
            'defaultLifetime' => GeoLocationCache::DEFAULT_LIFETIME,
        ];
    }
})();
