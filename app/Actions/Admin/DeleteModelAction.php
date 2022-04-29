<?php

namespace App\Actions\Admin;

use Illuminate\Database\Eloquent\Model;

class DeleteModelAction
{
    public function execute(Model $model): void
    {
        $model->delete();
    }
}
