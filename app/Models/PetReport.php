<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetReport extends Model
{
    public const SPECIES = ['dog' => 'Dog', 'cat' => 'Cat', 'other' => 'Other animal'];
    public const STATUSES = ['lost' => 'Lost', 'found' => 'Found', 'reunited' => 'Reunited'];

    protected $fillable = [
        'name', 'species', 'breed', 'color', 'city', 'neighborhood',
        'last_seen_at', 'description', 'status',
    ];

    protected function casts(): array
    {
        return ['last_seen_at' => 'date'];
    }

    public function speciesLabel(): string
    {
        return self::SPECIES[$this->species] ?? 'Other animal';
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? 'Not provided';
    }
}
