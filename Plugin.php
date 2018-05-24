<?php

namespace DamianLewis\CookieConsent;

use System\Classes\PluginBase;

/**
 * CookieConsent Plugin
 *
 * @package DamianLewis\CookieConsent
 */
class Plugin extends PluginBase
{
    const COOKIE_NAME = 'cookieconsent_status';
    const COOKIE_STATUS_ALLOW = 'allow';

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'Cookie Consent',
            'description' => 'Checks the status of the consent cookie.',
            'author'      => 'Damian Lewis',
            'icon'        => 'icon-legal'
        ];
    }

    /**
     * Registers CMS markup tags introduced by this plugin.
     *
     * @return array
     */
    public function registerMarkupTags(): array
    {
        return [
            'functions' => [
                'allowCookies' => [$this, 'allowCookies']
            ]
        ];
    }

    /**
     * Checks if the consent cookie is set to 'allow'.
     *
     * @return bool
     */
    public function allowCookies(): bool
    {
        if (!empty($_COOKIE[self::COOKIE_NAME]) && $_COOKIE[self::COOKIE_NAME] == self::COOKIE_STATUS_ALLOW) {
            return true;
        }

        return false;
    }
}
