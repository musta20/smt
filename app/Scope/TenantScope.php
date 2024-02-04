<?php
namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope{


    public function apply(Builder $builder, Model $model)
    {
        //dd(tenant());
        $builder->where('tenant_id',tenant('id'));
    }



}


?>