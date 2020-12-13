<?php

namespace App\Repositories;
use App\Models\User;

class ExpenseRepository
{
    public function forUser(User $user)
    {
        return $user->expenses()
                    ->orderBy('created_at','asc')
                    ->get();
    }
}