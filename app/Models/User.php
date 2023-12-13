<?php

namespace App\Models;
use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends AdminModel implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'fullname', 'password', 'avatar', 'level', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'];
    protected $guarded = ['_token', 'avatar_current', 'password_confirmation', 'task'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function __construct()
    {
        $this->folderUpload = 'user';
        $this->fieldSearchAccepted = ['id', 'username', 'email', 'fullname'];
    }



    public function listItems($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = self::query();

            if ($params['filter']['status'] !== "all") {
                $query->where('status', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->orderBy('id', 'desc')->paginate($params['pagination']['totalItemsPerPage']);

        }
        return $result;
    }




    public function countItems($params = null, $options = null)
    {
        $result = null;
        if ($options['task'] == 'admin-count-items-group-by-status') {
            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));
                if ($params['search']['value'] !== "") {
                    if ($params['search']['field'] == "all") {
                        $query->where(function ($query) use ($params) {
                            foreach ($this->fieldSearchAccepted as $column) {
                                $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                            }
                        });
                    } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                        $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                    }
                }
                $result = $query->get()->toArray();
        }
        return $result;
    }









    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'username', 'email', 'status', 'fullname', 'level', 'avatar')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-avatar') {
            $result = self::select('id', 'avatar')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'auth-login') {
            $result = self::select('id', 'username', 'fullname', 'email', 'level', 'avatar')
                ->where('status', 'active')
                ->where('email', $params['email'])
                ->where('password', bcrypt($params['password']))->first();

            if ($result)
                $result = $result->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status]);
        }

        if ($options['task'] == 'add-item') {
            $params['created_by'] = "admin";
            $params['avatar'] = $this->uploadThumb($params['avatar']);
            $params['password'] = bcrypt($params['password']);
            self::create($params);
        }

        if ($options['task'] == 'edit-item') {
            if (!empty($params['avatar'])) {
                $this->deleteThumb($params['avatar_current']);
                $params['avatar'] = $this->uploadThumb($params['avatar']);
            }
            $params['updated_by'] = "admin";
            self::where('id', $params['id'])->update(Arr::except($params, $this->getGuarded()));
        }

        if ($options['task'] == 'change-level') {
            $level = $params['currentLevel'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }

        if ($options['task'] == 'change-level-post') {
            $level = $params['level'];
            self::where('id', $params['id'])->update(['level' => $level]);
        }

        if ($options['task'] == 'change-password') {
            $password = bcrypt($params['password']);
            self::where('id', $params['id'])->update(['password' => $password]);
        }
    }

    public function deleteItem($params = null, $options = null)
    {
        if ($options['task'] == 'delete-item') {
            $item = self::getItem($params, ['task' => 'get-avatar']); 
            $this->deleteThumb($item['avatar']);
            self::where('id', $params['id'])->delete();
        }
    }
}
