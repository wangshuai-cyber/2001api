@extends('admin/layout')
@section('create')
    @if ($errors->any())
        <div class="alert alert-danger" style="padding-bottom: 20px;padding-left: 20px">
            <ul>@foreach ($errors->all() as $error)
                    <li style="margin-top: 10px;color:#ff0000;">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="layui-form" action="{{url('brand/store')}}" method="post">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">品牌名称</label>
            <div class="layui-input-block">
                <input type="text" name="brand_name" lay-verify="title" autocomplete="off" placeholder="请输入品牌名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌LOGO</label>

            <div class="layui-upload-drag" id="test10">
                <i class="layui-icon"></i>
                <p>点击上传，或将文件拖拽到此处</p>
                <div class="layui-hide" id="uploadDemoView">
                    <hr>
                    <img src="" alt="上传成功后渲染" style="max-width: 196px">
                </div>
            </div>
            <input type="hidden" name="brand_logo">
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌网址</label>
            <div class="layui-input-block">
                <input type="text" name="brand_url" lay-verify="title" autocomplete="off" placeholder="请输入品牌网址" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌简介</label>
            <div class="layui-input-block">
                <input type="text" name="brand_desc" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <button type="submit" class="layui-btn">添加</button>
    </form>
@endsection

<script src="/static/admin/layui/layui.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });

    layui.use('upload', function(){
        var $ = layui.jquery
                ,upload = layui.upload;
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        //拖拽上传
        upload.render({
            elem: '#test10'
            ,url: 'http://2001.com/brand/upload' //改成您自己的上传接口
            ,done: function(res){
                layer.msg(res.msg);
                layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.data);
                //console.log(res)
        layui.$('input[name="brand_logo"]').attr('value',res.data);
            }
        });
    });
    </script>

