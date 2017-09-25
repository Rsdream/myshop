<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Intervention\Image\ImageManager;

class ImageApi extends Controller
{
    /**
     * 品牌logo上传到七牛云
     * @param  string $filePath 图片路径
     * @param  string $fileName 图片名字
     * @return string $ret 成功的状态 $err 错误的状态
     */
    public static function imgUp($filePath, $fileNmae)
    {

        $bucket = 'images';
        $secretKey = 'A8vb3UPGRXXfh5hvcvHfBGLVcRUSRVDuY4RbOy1q';
        $accessKey = 'lWvvVGZpbDI85oxvvWcgJonVt3Py3rAL9zz0g5XV';
        $auth = new Auth($accessKey, $secretKey);

        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $filePath;
        // 上传到七牛后保存的文件名
        $key = $fileNmae;
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

        if ($err !== null) {
            return $err;
        } else {
            return $ret;
        }
    }

    /**
     * 处理图片方法
     * @param  string $filePath 图片路径
     * @param  string $width    图片的高
     * @param  string $height   图片的宽
     * @param  string $fileNmae 要保存的图片名
     * @return string $filePath 处理成功返回图片的路径
     */
    public static function attrImg($filePath, $width, $height, $fileName)
    {
        $manager = new ImageManager(array('driver' => 'gd'));

        $image = $manager->make($filePath)->resize($width, $height);

        $filePath = './upload/image/'.$fileName;

        $bool = $image->save($filePath);

        if ($bool) {
            return $filePath;
        }
    }
}
