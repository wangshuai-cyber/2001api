@extends('admin/layout')
@section('edit')
    @if ($errors->any())
        <div class="alert alert-danger" style="padding-bottom: 20px;padding-left: 20px">
            <ul>@foreach ($errors->all() as $error)
                    <li style="margin-top: 10px;color:#ff0000;">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="layui-form" action="{{url('brand/update/'.$brand->brand_id)}}" method="post">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">品牌名称</label>
            <div class="layui-input-block">
                <input type="text" name="brand_name" lay-verify="title" autocomplete="off" placeholder="请输入品牌名称" value="{{$brand->brand_name}}" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌LOGO</label>

            <div class="layui-upload-drag" id="test10">
                <i class="layui-icon"></i>
                <p>点击上传，或将文件拖拽到此处</p>
                <div @if(!$brand->brand_logo)class="layui-hide" @endif
                id="uploadDemoView">
                    <hr>
                    <img src="{{$brand->brand_logo}}" alt="上传成功后渲染" style="max-width: 196px">
                </div>
            </div>
            <input type="hidden" name="brand_logo" @if($brand->brand_logo) value="{{$brand->brand_logo}}" @endif>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌网址</label>
            <div class="layui-input-block">
                <input type="text" name="brand_url" lay-verify="title" value="{{$brand->brand_url}}" autocomplete="off" placeholder="请输入品牌网址" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌简介</label>
            <div class="layui-input-block">
                <input type="text" name="brand_desc" value="{{$brand->brand_desc}}" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <button type="submit" class="layui-btn">修改</button>
    </form>
@endsection