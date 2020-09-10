@foreach($data as $v)
    <tr>
        
        <td class="center">
                <input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->brand_id}}">
            </td>
            <td>{{$v->brand_id}}</td>
        <td>{{$v->brand_name}}</td>
        <td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="50">@endif</td>
        <td>{{$v->brand_url}}</td>
        <td>{{$v->brand_desc}}</td>
        <td>
            <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="layui-btn layui-btn-normal">编辑</a>
            <!-- <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="layui-btn layui-btn-warm">删除</a> -->
            <a href="javascript:void(0)" onclick="deleteByID({{$v->brand_id}},this)" class="layui-btn layui-btn-warm">删除</a>
        </td>
    </tr>
@endforeach

<tr >
    <td colspan="7">{{$data->links('vendor.pagination.admin')}}
        <button type="button" class="layui-btn layui-btn-normal moredel">批量删除</button>
    </td>
</tr>