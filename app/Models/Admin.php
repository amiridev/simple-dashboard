<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yajra\DataTables\DataTables;

/**
 * Class Admin
 * @package App\Models
 *
 * @property string $name
 * @property string $family
 * @property string $username
 * @property string $mobile
 * @property string $password
 * @property string $status
 * @property string $login_at
 * @property string $created_at
 * @property string $updated_at
 */
class Admin extends Authenticatable
{
    use ModelTrait, HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name' ,
        'family' ,
        'username' ,
        'mobile' ,
        'email' ,
        'password',
        'status',
        'login_at'
    ];

    protected $dates = [
        'login_at',
        'created_at',
        'updated_at'
    ];
    public static function Datatable($admins)
    {
        $datatable = DataTables::of($admins)
            ->editColumn('status', function ($admin) {
                $status = $admin->admins_status ? 'فعال' : 'غیرفعال';
                return "<span id='sts-span-$admin->id'>$status</span>";
            })->editColumn('created_at', function ($admin) {
                return '<span>' . j_date_format($admin->created_at) . '</span>';
            })->editColumn('updated_at', function ($admin) {
                return '<span>' . j_date_format($admin->updated_at) . '</span>';
            })->editColumn('login_at', function ($admin) {
                if($admin->login_at){
                    return '<span>' . j_date_format($admin->login_at) . '</span>';
                }
                return '--';
            })->editColumn('action', function ($admin) {
                $editLink = route('dashboard.admins.edit', ['admin' => $admin->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['status', 'created_at', 'updated_at', 'login_at' ,'action'])->make(true);
    }
}
