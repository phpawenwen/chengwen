<?php

namespace App\Policies;

use App\Models\Admins;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function update($currentadmin,Admins $admin){
        return $currentadmin->id===$admin->id;
    }
}
