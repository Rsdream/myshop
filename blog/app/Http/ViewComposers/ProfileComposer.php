<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Controllers\Home\IndexController;

/**
 * 前台页面资源数据共享
 * @author rong <[871513137@qq.com]>
 *
 */
class ProfileComposer
{
    protected $index;

    public function __construct(IndexController $index)
    {
         $this->index = $index;
    }
    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        //在视图中使用{{$count}}拿到aa
        $view->with('logo',  $this->index->logoShareData());
        $view->with('url', $this->index->urlShareData());
    }
}
