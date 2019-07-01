<?php

namespace App\Models;

use App\Models\{User, File};
use App\Traits\HasApprovals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes;
    use HasApprovals;
    
    protected $fillable = [
        'filename',
        'size',
        'approved'
    ];
    
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function getPathAttribute()
    {
        return storage_path('app/files/' . $this->file->identifier . '/' . $this->filename);
    }
}
