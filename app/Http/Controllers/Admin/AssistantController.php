<?php

namespace App\Http\Controllers\Admin;

use App\Events\SystemLogEvent;
use Illuminate\Http\Request;
use Validator;
use App\Models\SystemOption;
use Cache;


/**
 * 助手控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class AssistantController extends AdminController
{

    protected $validatorMessages = [
        'picture.image' => '文件类型不允许,请上传常规的图片(bmp|gif|jpg|png)文件',
        'picture.max' => '文件过大,文件大小不得超出5MB',
        'document.max' => '文件过大,文件大小不得超出50MB',
        'document.mimes' => '文件类型不允许,请上传常规的文档(doc|docx|xls|xlsx|ppt|pptx|pdf)文件或压缩(rar|zip|7z)文件',
    ];

    /**
     * 上传图片页面
     *
     * @return Response
     */
    public function getUploadPicture()
    {
        return view('admin.back.upload.picture_create');
    }

    /**
     * 上传文档页面
     *
     * @return Response
     */
    public function getUploadDocument()
    {
        return view('admin.back.upload.document_create');
    }

    /*
     * 上传图像文件
     * 允许上传的文件为 image mime
     * 上传逻辑直接放在控制器里予以处理，你也可剥离出一些代码到其它类里
     *
     * @params Request $request
     *
     * @return Response
     */
    public function postUploadPicture(Request $request)
    {
        try {
            if (!$request->ajax()) {
                throw new \Exception('非法请求，不予处理！', 100001);
            }

            if (!$request->hasFile('picture')) {
                throw new \Exception('失败原因为：<span class="text_error">不存在待上传的文件</span>');
            }

            $file = $request->file('picture');
            $data = $request->all();

            $validator = Validator::make($data, [
                'picture' => 'image|max:5120',
            ], [
                'picture.image' => '文件类型不允许,请上传常规的图片(bmp|gif|jpg|png)文件',
                'picture.max' => '文件过大,文件大小不得超出5MB',
            ]);

            if (!$validator->passes()) {
                throw new \Exception($validator->errors()->first());
            }

            $realPath = $file->getRealPath();
            $destPath = 'uploads/content/';
            $savePath = $destPath . '' . date('Ymd', time());
            is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $uniqid = uniqid() . '_' . date('s');
            $oFile = $uniqid . 'o.' . $ext;
            $rFile = $uniqid . 'rw300.' . $ext;

            $fullfilename = '/' . $savePath . '/' . $oFile;  //原始完整路径

            if (!$file->isValid()) {
                throw new \Exception('失败原因为：<span class="text_error">文件校验失败</span>');
            }

            $uploadSuccess = $file->move($savePath, $oFile);  //移动文件

            event(new SystemLogEvent('upload', '上传图片'));

            return response()->json([
                'status' => 1,
                'info' => $fullfilename,
                'operation' => '上传操作',
                'url' => '',
            ]);

        } catch (\Exception $e) {
            $error_code = $e->getCode();
            if ($error_code != 100001) {
                return response()->json([
                    'status' => 0,
                    'info' => $e->getMessage(),
                    'operation' => '上传操作',
                    'url' => '',
                ]);
            } else {
                return view('admin.back.exceptions.jump', ['exception' => $e->getMessage()]);
            }
        }
    }

    /*
     * 上传图像文件
     * 允许上传的文件为 image mime
     * 上传逻辑直接放在控制器里予以处理，你也可剥离出一些代码到其它类里
     *
     * @params Request $request
     *
     * @return Response
     */
    public function postUploadDocument(Request $request)
    {
        try {
            if (!$request->ajax()) {
                throw new \Exception('非法请求，不予处理！', 100001);
            }

            if (!$request->hasFile('document')) {
                throw new \Exception('失败原因为：<span class="text_error">不存在待上传的文件</span>');
            }

            $file = $request->file('document');
            $data = $request->all();

            $validator = Validator::make($data, [
                'document' => 'mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,rar,zip,7z|max:51200',
            ], [
                'document.mimes' => '文件类型不允许,请上传常规的图片(doc|docx|xls|xlsx|ppt|pptx|pdf|rar|zip|7z)文件',
                'document.max' => '文件过大,文件大小不得超出5MB',
            ]);

            if (!$validator->passes()) {
                throw new \Exception($validator->errors()->first());
            }

            $realPath = $file->getRealPath();
            $destPath = 'uploads/content/';
            $savePath = $destPath . '' . date('Ymd', time());
            is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $uniqid = uniqid() . '_' . date('s');
            $oFile = $uniqid . 'o.' . $ext;
            $rFile = $uniqid . 'rw300.' . $ext;

            $fullfilename = '/' . $savePath . '/' . $oFile;  //原始完整路径

            if (!$file->isValid()) {
                throw new \Exception('失败原因为：<span class="text_error">文件校验失败</span>');
            }

            $uploadSuccess = $file->move($savePath, $oFile);  //移动文件

            event(new SystemLogEvent('upload', '上传文件'));

            return response()->json([
                'status' => 1,
                'info' => $fullfilename,
                'operation' => '上传操作',
                'url' => '',
            ]);

        } catch (\Exception $e) {
            $error_code = $e->getCode();
            if ($error_code != 100001) {
                return response()->json([
                    'status' => 0,
                    'info' => $e->getMessage(),
                    'operation' => '上传操作',
                    'url' => '',
                ]);
            } else {
                return view('admin.back.exceptions.jump', ['exception' => $e->getMessage()]);
            }
        }
    }

    /**
     * 重建系统缓存
     * 更新内容或者刚安装完本CMS之后，如果数据显示异常，请执行本方法
     *
     * @return Response
     */
    public function getRebuildCache()
    {
        $system_options = SystemOption::all();
        foreach ($system_options as $so) {
            if (config('cache.default') === 'memcached' || config('cache.default') === 'redis') {
                Cache::tags('system', 'static')->forever($so['name'], $so['value']);
            } else {
                Cache::forever($so['name'], $so['value']);
            }
        }

        event(new SystemLogEvent('management', '刷新缓存'));

        return view('admin.back.cache.index');
    }
}
