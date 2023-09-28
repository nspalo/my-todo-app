<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
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
 * @property int $completed
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

    public function isCompleted(): bool
    {
        return (bool)$this->completed;
    }
}
