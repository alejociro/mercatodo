<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements WithHeadings, FromQuery
{
    private ?string $status;
    private array $dates;

    public function forStatus(string $status = null)
    {
        $this->status = $status;

        return $this;
    }

    public function forDates($array)
    {
        $this->dates = $array;

        return $this;
    }

    public function query()
    {
        return Payment::query()->when($this->status, function ($query) {
            $query->where('status', $this->status);})
            ->WhereBetween('created_at', [$this->dates['initial'], $this->dates['end']])
            ->select('reference', 'payer_document', 'amount', 'status', 'paid_at', 'process_url', 'request_id');
    }
    public function headings(): array
    {
        return [
            'reference',
            'payer_document',
            'amount',
            'status',
            'paid_at',
            'process_url',
            'request_id'
        ];
    }
}
