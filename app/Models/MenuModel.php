<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class MenuModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'menu';
        $this->folderUpload        = 'menu' ; 
        $this->fieldSearchAccepted = [ 'name', 'link']; 
        $this->crudNotAccepted     = ['_token'];
        
    }

    public function listItems($params = null, $options = null) {
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status', 'link', 'type', 'type_open','created_at', 'created_by', 'updated_at', 'updated_by');
            if ($params['filter']['status'] !== "all")  {
                $query->FilterStatus($params['filter']['status']);
            }
            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->FilterSearchOr($column, $params['search']['value']);
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->FilterSearch($params['search']['field'], $params['search']['value']);
                } 
            }
            $result =  $query->orderBy('id', 'desc')->paginate($params['pagination']['totalItemsPerPage']);
        }
        if ($options['task'] == 'menu-list-items') {
            $query = $this->select('id', 'name', 'link', 'type', 'type_open')
                ->where('status', '=', 'active')->orderBy('id', 'desc');

            $result = $query->get()->toArray();
        }
        return $result;
    }
    public function countItems($params = null, $options  = null) {
        $result = null;
        if($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this::groupBy('status')->select( DB::raw('status , COUNT(id) as count') );
            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->FilterSearchOr($column, $params['search']['value']);
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->FilterSearch($params['search']['field'], $params['search']['value']);
                } 
            }
            $result = $query->get()->toArray();
        }
        return $result;
    }
    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'type', 'status', 'link', 'type_open')->where('id', $params['id'])->first();
        }
        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = "hailan";
            $params['created_at']    = date('Y-m-d');
            self::insert($this->prepareParams($params));        
        }

        if($options['task'] == 'edit-item') {
            $params['updated_by']   = "hailan";
            $params['updated_at']      = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }

}








   
