<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\NodeTrait;

class CategoryModel extends AdminModel
{
    use NodeTrait;
    protected $table               = 'categories';
    protected $guarded = [];

    // Accessor
    public function getIsHomeTemplateAttribute()
    {
        $this->is_home = ($this->is_home == 'yes' || $this->is_home == 'no') ? $this->is_home : 'no';
        return $this->is_home == 'yes' ? ['name' => 'Hiển thị Home', 'class' => 'btn-primary'] :['name' => 'Không hiển thị home', 'class' => 'btn-warning'];
    }
    
    public function listItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'status', 'is_home', 'display', 'created_at', 'created_by', 'updated_at', 'updated_by')->whereNull('parent_id');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name')
                ->where('status', '=', 'active')
                ->limit(8);

            $result = $query->get()->toArray();
        }

        if ($options['task'] == 'news-list-items-is-home') {
            $query = $this->select('id', 'name', 'display')
                ->where('status', '=', 'active')
                ->where('is_home', '=', 'yes');

            $result = $query->get()->toArray();
        }

        if ($options['task'] == "admin-list-items-in-selectbox") {
            $query = $this->select('id', 'name')
                ->orderBy('name', 'asc')
                ->where('status', '=', 'active');

            $result = $query->pluck('name', 'id')->toArray();
        }
        return $result;
    }

    public function countItems($params = null, $options  = null)
    {

        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            // if ($params['search']['value'] !== "") {
            //     if ($params['search']['field'] == "all") {
            //         $query->where(function ($query) use ($params) {
            //             foreach ($this->fieldSearchAccepted as $column) {
            //                 $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
            //             }
            //         });
            //     } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
            //         $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
            //     }
            // }

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'status', 'is_home', 'display', 'parent_id', '_lft', '_rgt')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'news-get-item') {
            $result = self::select('id', 'name', 'display')->where('id', $params['category_id'])->first();

            if ($result) $result = $result->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);
        }

        if ($options['task'] == 'change-is-home') {
            $isHome = ($params['currentIsHome'] == "yes") ? "no" : "yes";
            self::where('id', $params['id'])->update(['is_home' => $isHome]);
        }

        if ($options['task'] == 'change-display') {
            $display = $params['currentDisplay'];
            self::where('id', $params['id'])->update(['display' => $display]);
        }

        if ($options['task'] == 'add-item') {
            $params['created_by'] = "hailan";
            $params['created_at']    = date('Y-m-d');
            $parent = self::find($params['parent_id']);
            // self::insert($this->prepareParams($params));
            self::create($this->prepareParams($params), $parent);
        }

        if ($options['task'] == 'edit-item') {
            $params['updated_by']   = "hailan";
            $params['updated_at']      = date('Y-m-d');
            $parent = self::find($params['parent_id']);
            $node = $current = self::find($params['id']);
            $node->update($this->prepareParams($params));
            if($current->parent_id != $params['parent_id']) $node->appendToNode($parent)->save();
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $node = self::find($params['id']);
            $node->delete();
            // self::where('id', $params['id'])->delete();
        }
    }
    public function categories() {
        return $this->hasMany(CategoryModel::class, 'parent_id', 'id')->with('categories');
    }
    public function categoriesActive() {
        return $this->hasMany(CategoryModel::class, 'parent_id', 'id')->where('status', 'active')->with('categoriesActive');
    }
    public function getNameWithDepthAttribute()
    {
        return str_repeat(' /----- ', $this->depth) . $this->name;
    }
}
