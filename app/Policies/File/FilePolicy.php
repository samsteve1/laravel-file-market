<?php

namespace App\Policies\File;

use App\Models\User;
use App\Models\File;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    public function touch(User $user, File $file)
    {
        return auth()->user()->id === $file->user->id;
    }
}
