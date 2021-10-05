<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Yajra\DataTables\Facades\DataTables;

/**
 * @property string $name
 * @property string $family
 * @property string $username
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, ModelTrait ,HasApiTokens;

    protected $fillable = [
        'name' ,
        'family' ,
        'username' ,
        'mobile' ,
        'email' ,
        'password',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public static function Datatable($users)
    {
        $datatable = DataTables::of($users)
            ->editColumn('name' ,function ($user){
                return $user->name;
            })->editColumn('family' , function ($user){
                return $user->family;
            })->editColumn('username' ,function ($user){
                return $user->username;
            })->editColumn('mobile' ,function ($user){
                return $user->mobile;
            })->editColumn('email' ,function ($user){
                return $user->email;
            })->editColumn('status', function ($user) {
                $status = $user->admins_status ? 'فعال' : 'غیرفعال';
                return "<span id='sts-span-$user->id'>$status</span>";
            })->editColumn('created_at', function ($user) {
                return '<span>' . j_date_format($user->created_at) . '</span>';
            })->editColumn('updated_at', function ($user) {
                return '<span>' . j_date_format($user->updated_at) . '</span>';
            })->editColumn('action', function ($user) {
                $editLink = route('dashboard.users.edit', ['user' => $user->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['name', 'family', 'username' ,'mobile', 'email', 'status', 'created_at', 'updated_at' ,'action'])->make(true);
    }
//
//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];
//
//
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
