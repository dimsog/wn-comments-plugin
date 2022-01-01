<?php

namespace Dimsog\Comments\Models;

use Model;
use System\Behaviors\SettingsModel;

class Settings extends Model
{
    public $implement = [SettingsModel::class];

    public $settingsCode = 'dimsog_comments';

    public $settingsFields = 'fields.yaml';


    public static function isModerateComments(): bool
    {
        return static::get('moderate', false);
    }
}
