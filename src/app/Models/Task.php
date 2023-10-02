<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @package App\Models
 *
 * @method static Model|Collection find($id, $columns = ['*'])
 * @method static Model|Collection findOrFail($id, $columns = ['*'])
 * @method static EloquentBuilder orderBy($column, $direction = 'asc')
 *
 * @property int $id
 * @property string $title
 * @property boolean $completed
 * @property Carbon $completed_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'completed',
        'completed_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:Y/m/d',
        'completed_at' => 'date:Y/m/d',
        'updated_at' => 'date:Y/m/d',
    ];

    public function isCompleted(): bool
    {
        return $this->completed;
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getCompleted(): ?string
    {
        return $this->getAttribute('completed');
    }

    public function getCompletedAt(): ?Carbon
    {
        return $this->getAttribute('completed_at');
    }

    public function setTitle(string $title): self
    {
        $this->setAttribute('title', $title);

        return $this;
    }

    public function setCompleted(bool $completed): self
    {
        $this->setAttribute('completed', $completed);

        return $this;
    }

    public function setCompletedAt(Carbon $date): self
    {
        $this->setAttribute('completed_at', $date);

        return $this;
    }
}
