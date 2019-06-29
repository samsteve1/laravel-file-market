<?php

namespace App\Models;

use App\Models\User;
use App\Models\Upload;
use App\Traits\HasApprovals;
use App\Models\FileApproval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class File extends Model
{
    use SoftDeletes;
    use HasApprovals;

    const APPROVAL_PROPERTIES = [
        'title',
        'overview_short',
        'overview',
    ];

    protected $fillable = [
        'title',
        'overview_short',
        'overview',
        'price',
        'live',
        'approved',
        'finished'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($file){
            $file->identifier = uniqid(true);
        });
    }
    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function scopeFinished(Builder $builder)
    {
        return $builder->where('finished', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isFree()
    {
        return $this->price == 0;
    }
    public function approvals()
    {
        return $this->hasMany(FileApproval::class);
    }

    public function mergeApprovalProperties()
    {
        $this->update(array_only(
            $this->approvals->first()->toArray(),
            self::APPROVAL_PROPERTIES
        ));

    }
    public function approve()
    {
        
        $this->approveAllUploads();
        $this->updateToBeVisible();
    }

    public function approveAllUploads()
    {
        $this->uploads()->update([
            'approved'  => true
        ]);
    }

    public function updateToBeVisible()
    {
        $this->update([
            'live' =>   true,
            'approved'  => true,
        ]);
    }

    public function deleteAllApprovals()
    {
        $this->approvals()->delete();
    }

    public function deleteUnapprovedUploads()
    {
        $this->uploads()->unapproved()->delete();
    }
     public function needsApproval(array $approvalProperties)
    {
        if ($this->currentPropertiesDifferToGiven($approvalProperties)) {

            return true;
        }
      
        if($this->uploads()->unapproved()->count()) {
            return true;
        }

        return false;
    }
    protected function currentPropertiesDifferToGiven(array $properties)
    {
        return array_only($this->toArray(), self::APPROVAL_PROPERTIES) != $properties;
    }
    public function createApproval(array $properties)
    {
        $this->approvals()->create($properties);
    }
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
