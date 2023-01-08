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

    public function getUserName(): ?string
    {
        if (!$this->checkUserPluginIsExists()) {
            return null;
        }
        $user = Auth::user();
        if (!empty($user->name)) {
            return $user->name;
        }
        if (!empty($user->first_name) || !empty($user->last_name)) {
            return trim($user->first_name . ' ' . $user->last_name);
        }
        return null;
    }

    public function getUserEmail(): ?string
    {
        if (!$this->checkUserPluginIsExists()) {
            return null;
        }
        $user = Auth::user();
        if (!empty($user->email)) {
            return $user->email;
        }
        return null;
    }
}
