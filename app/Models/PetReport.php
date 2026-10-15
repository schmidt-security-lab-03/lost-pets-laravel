<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetReport extends Model
{
    public const SPECIES = ['dog' => 'Cachorro', 'cat' => 'Gato', 'other' => 'Outro animal'];
    public const STATUSES = ['lost' => 'Perdido', 'found' => 'Encontrado', 'reunited' => 'Reencontrado'];

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
        return self::SPECIES[$this->species] ?? 'Outro animal';
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? 'Não informado';
    }
}
