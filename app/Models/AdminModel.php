<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 

class AdminModel extends Model
{
    
    

    protected $table            = '';
    protected $folderUpload     = '' ;
    protected $fieldSearchAccepted   = [
        'id',
        'name'
    ]; 

    protected $crudNotAccepted = [
        '_token',
        'thumb_current',
    ];


    public function uploadThumb($thumbObj) {
        $thumbName        = Str::random(10) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($this->folderUpload, $thumbName, 'zvn_storage_image' );
        return $thumbName;
    }

    public function deleteThumb($thumbName){
        Storage::disk('zvn_storage_image')->delete($this->folderUpload . '/' . $thumbName);
    }
    

    public function prepareParams($params){
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }

    public function getStatusTemplateAttribute()
    {
        $this->status = ($this->status == 'active' || $this->status == 'inactive') ? $this->status : 'inactive';
        return $this->status == 'active' ? ['name' => 'Kích hoạt', 'class' => 'btn-success'] :['name' => 'Chưa kích hoạt', 'class' => 'btn-info'];
    }

    function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    function scopeFilterStatus($query , $status)
    {
        return $query->where('status', $status);
    }
    function scopeFilterSearch($query , $searchField , $searchValue)
    {
        return $query->where($searchField, 'LIKE',  "%{$searchValue}%");
    }
    function scopeFilterSearchOr($query , $searchField , $searchValue)
    {
        return $query->orWhere($searchField, 'LIKE',  "%{$searchValue}%");
    }

}

