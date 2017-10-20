<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;// 消息通知相关引用
use Illuminate\Foundation\Auth\User as Authenticatable; //是授权相关功能引用

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ]; // 用户过滤字段 只有包含在该属性中的字段才能被正常更新

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ]; // 敏感信息在用户实例通过数组或json显示进行隐藏

    protected $table = 'users';


    # 获取用户头像
    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
}
