<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class SearchHelper
{
    public static function search(Model $model, $searchTerm, $columns = ['name'], $perPage = 10)
    {
        return $model::where(function ($query) use ($searchTerm, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $searchTerm . '%');
            }
        })->paginate($perPage);
    }
}
