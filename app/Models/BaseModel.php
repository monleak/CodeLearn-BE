<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    protected static function deleteRelation($model)
    {
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $user = Auth::user();

            if (empty($model->creator_id)) {
                if (!empty($user)) {
                    $model->creator_id = $user->id;
                    $model->updated_by = $user->id;
                }
            }
        });

        static::updating(function ($model) {
            $user = Auth::user();

            if ($model->deleted_by) return;
            if (!empty($user)) {
                $model->updated_by = $user->id;
            }
        });

        static::deleting(function ($model) {
            $user = Auth::user();

            if (!empty($user)) {
                $model->deleted_by = $user->id;
            }
            $model->save();
            static::deleteRelation($model);
        });
    }
}
