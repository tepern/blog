<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string $brief
 * @property string $fullText
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $author
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBrief($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereFullText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'brief',
        'fullText'
    ];
    
    /**
     * Автор статьи.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthorId(): ?int
    {
        return $this->author;
    }

    public function setAuthorId(int $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getBrief(): ?string
    {
        return $this->brief;
    }

    public function setBrief(string $brief): static
    {
        $this->brief = $brief;

        return $this;
    }

    public function getFullText(): ?string
    {
        return $this->fullText;
    }

    public function setFullText(string $text): static
    {
        $this->fullText = $text;

        return $this;
    }

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
