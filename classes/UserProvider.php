<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes;

use Auth;
use Winter\Storm\Auth\Models\User;

class UserProvider
{
    private ?int $userId = null;

    private ?User $user;

    public function __construct()
    {
        if ($this->checkUserPluginIsExists()) {
            $this->userId = Auth::id();
            $this->user = Auth::user();
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
        return empty($this->user);
    }

    public function getUserName(): ?string
    {
        if (empty($this->user)) {
            return null;
        }
        if (!empty($this->user->name)) {
            return $this->user->name;
        }
        if (!empty($this->user->first_name) || !empty($this->user->last_name)) {
            return trim($this->user->first_name . ' ' . $this->user->last_name);
        }
        return null;
    }

    public function getUserEmail(): ?string
    {
        if (empty($this->user)) {
            return null;
        }
        if (!empty($this->user->email)) {
            return $this->user->email;
        }
        return null;
    }
}
