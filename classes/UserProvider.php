<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes;

use Auth;

class UserProvider
{
    private ?int $userId = null;


    public function __construct()
    {
        if ($this->checkUserPluginIsExists()) {
            $this->userId = Auth::id();
        }
    }

    public function checkUserPluginIsExists(): bool
    {
        return class_exists('Auth');
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function isGuest(): bool
    {
        if (!$this->checkUserPluginIsExists()) {
            return true;
        }
        return !Auth::check();
    }
}
