<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use HasUuids;

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid1();
    }

    /**
    *
    * @return array<string>
    */
    public function uniqueIds(): array
    {
        return ['id'];
    }

}
