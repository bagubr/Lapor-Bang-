<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class PermohonanScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->when((Auth::user()->tipe_user == 'USER'), function (Builder $query) {
            $query->whereHas('pejabat', function (Builder $query) {
                $query->where('user_id', Auth::user()->id);
            });
        })->when((Auth::user()->tipe_user == 'INSPEK'), function (Builder $query) {
            $query->whereHas('inspeksi', function (Builder $query) {
                $query->where('inspektor_id', Auth::user()->id);
            });
        });;
    }
}
