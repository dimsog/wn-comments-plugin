<?php

declare(strict_types=1);

namespace Dimsog\Comments\Models;

use Model;
use System\Behaviors\SettingsModel;

final class Settings extends Model
{
    public $implement = [SettingsModel::class];

    public $settingsCode = 'dimsog_comments';

    public $settingsFields = 'fields.yaml';


    public static function isModerateComments(): bool
    {
        return static::get('moderate', "0") === "1";
    }

    public static function isEmailNotification(): bool
    {
        return static::get('emailNotification') === '1';
    }

    public static function getAdminEmail(): ?string
    {
        return static::get('adminEmail');
    }
}
