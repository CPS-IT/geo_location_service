<?php
defined('TYPO3') or die();

// Register geo location cache
(function() {
    $cacheConfigurations = &$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'];

    if (!isset($cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME])) {
        $cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME] = [];
    }
    if (!isset($cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME]['backend'])) {
        $cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME]['backend']
            = \TYPO3\CMS\Core\Cache\Backend\Typo3DatabaseBackend::class;
    }
    if (!isset($cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME]['options'])) {
        $cacheConfigurations[\CPSIT\GeoLocationService\Cache\GeoLocationCache::NAME]['options'] = [
            'defaultLifetime' => \CPSIT\GeoLocationService\Cache\GeoLocationCache::DEFAULT_LIFETIME,
        ];
    }
})();
