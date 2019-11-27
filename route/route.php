<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


Route::post('push/BindClientId','index/Push/BindClientId');
Route::post('push/AjaxSendMessage','index/Push/AjaxSendMessage');
Route::get('push/hello','index/Push/hello');

//好看的聊天首页
Route::get('wechat/index','index/Index/wechat');

return [

];
