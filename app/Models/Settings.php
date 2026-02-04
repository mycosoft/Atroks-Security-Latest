<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'description',
    ];

    public $timestamps = true;

    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     */
    public static function set($key, $value, $group = 'general', $description = null)
    {
        $setting = self::where('key', $key)->first();

        if ($setting) {
            $setting->update([
                'value' => $value,
                'group' => $group,
                'description' => $description ?? $setting->description,
            ]);
        } else {
            $setting = self::create([
                'key' => $key,
                'value' => $value,
                'group' => $group,
                'description' => $description,
            ]);
        }

        return $setting;
    }

    /**
     * Get all settings as an array
     */
    public static function getAll()
    {
        return self::all()->pluck('value', 'key')->toArray();
    }

    /**
     * Get settings by group
     */
    public static function getByGroup($group)
    {
        return self::where('group', $group)->get()->pluck('value', 'key')->toArray();
    }

    /**
     * Update multiple settings at once
     */
    public static function updateMany(array $settings)
    {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }
}
