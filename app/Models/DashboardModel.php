<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class DashboardModel extends AdminModel
{
    public function __construct() {
        
    }

    public function listItems($params = null, $options = null) {
        $result = [];
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = current($table);
            $count = DB::table($tableName)->count();
            $result[$tableName] = $count;
        }
        return $result;
    }

    // public function moveData($paramsSource, $paramsDes)
    // {
    //     $result = false;
    //     // Truy xuất dữ liệu từ cơ sở dữ liệu nguồn 
    //     $dataFromSource = DB::table($paramsSource['table'])
    //         ->select('id', 'name', 'category_id', 'publish_at','type','content', 'thumb', 'created as created_at', 'created_by', 'modified as updated_at'
    //         , 'modified_by as updated_by', 'status')
    //         ->get()->toArray();
    //     // Chèn dữ liệu vào cơ sở dữ liệu đích 
    //     foreach ($dataFromSource as $key => $data) {
    //         $result = DB::connection('second_mysql')->table($paramsDes['table'])->insert( get_object_vars($data));
    //     }
    //     return $result;
    // }
}


