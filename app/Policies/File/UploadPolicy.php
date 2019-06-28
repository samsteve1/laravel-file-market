<?php

namespace App\Policies\File;

use App\Models\{User, Upload};
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadPolicy
{
    use HandlesAuthorization;

    public function touch(User $user, Upload $upload)
    {
        return $user->id == $upload->user_id;
    }
}
