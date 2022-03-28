<?php
declare(strict_types=1);
namespace CPSIT\GeoLocationService\Cache;

/*
 * This file is part of the TYPO3 CMS extension "geo_location_service".
 *
 * Copyright (C) 2019 Elias Häußler <e.haeussler@familie-redlich.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

use Psr\Http\Message\UriInterface;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * GeoLocationCache
 *
 * @author Elias Häußler <e.haeussler@familie-redlich.de>
 * @license GPL-2.0-or-later
 */
class GeoLocationCache
{
    /** @var string Cache name */
    public const NAME = 'geolocationservice_location';

    /** @var int Default cache lifetime */
    public const DEFAULT_LIFETIME = 86400;

    /**
     * @var FrontendInterface Cache instance
     */
    private $cache;

    public function __construct(FrontendInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $cacheIdentifier
     * @return mixed|null
     */
    public function get(string $cacheIdentifier)
    {
        return $this->cache->get($cacheIdentifier);
    }

    /**
     * @param string $cacheIdentifier
     * @param $data
     * @param array $tags
     * @param int|null $lifetime
     */
    public function set(string $cacheIdentifier, $data, array $tags = [], int $lifetime = null): void
    {
        $this->cache->set($cacheIdentifier, $data, $tags, $lifetime);
    }

    public function calculateCacheIdentifier(UriInterface $serviceUrl): string
    {
        $queryParams = GeneralUtility::explodeUrl2Array($serviceUrl->getQuery());
        array_multisort($queryParams);
        return sha1((string) $serviceUrl->withQuery(http_build_query($queryParams)));
    }
}
