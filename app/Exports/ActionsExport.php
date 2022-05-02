<?php

namespace App\Exports;

use App\Models\Action;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActionsExport implements FromQuery, WithHeadings, ShouldQueue
{
    private ? string $id;

    public function forUser(string $id = null)
    {
        $this->id = $id;

        return $this;
    }

    public function query()
    {
        return Action::query()->when($this->id, function ($query) {
            $query->where('user_id', $this->id);
        })->select('user_id','name','created_at');
    }

    public function headings(): array
    {
        return [
            'User_id',
            'Action',
            'Date'
        ];
    }
}
