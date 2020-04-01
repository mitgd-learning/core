<?php

namespace Flarum\Extend;

use Flarum\Extension\Extension;
use Flarum\User\NotificationPreference;
use Illuminate\Contracts\Container\Container;

class Notification implements ExtenderInterface
{
    private $channels = [];

    public function extend(Container $container, Extension $extension = null)
    {
        foreach ($this->channels as $channel => $enabled) {
            NotificationPreference::addChannel($channel, $enabled ?? []);
        }
    }

    public function addChannel(string $channel, array $enabledTypes = null)
    {
        $this->channels[$channel] = $enabledTypes;

        return $this;
    }
}