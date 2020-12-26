<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'age',
    ];

    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

class MyCollection extends Collection
{
    public function fields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
    }
}
