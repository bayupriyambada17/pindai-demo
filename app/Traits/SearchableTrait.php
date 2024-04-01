<?php

namespace App\Traits;

trait SearchableTrait
{
    public static function search($searchTerm, $columns = [], $perPage = 10)
    {
        // Pastikan $columns adalah array
        if (!is_array($columns)) {
            throw new \InvalidArgumentException('$columns must be an array');
        }

        // Lanjutkan dengan logika pencarian
        return self::where(function ($query) use ($searchTerm, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $searchTerm . '%');
            }
        });
    }
}
