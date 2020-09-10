@extends('admin/layout')
@section('show')
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th width="5%">
              <input type="checkbox" name="allcheckbox" id="all" lay-skin="primary">
          </th>
            <th>id</th>
            <th>商品名称</th>
            <th>商品logo</th>
            <th>商品网址</th>
            <th>商品简介</th>
            <th>操作</th>
        </tr>
        </thead>
        
        <tbody>
            @foreach($data as $v)
        <tr>
            <td class="center">
                <input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->brand_id}}">
            </td>
            <td>{{$v->brand_id}}</td>
             <td id="{{$v->brand_id}}" oldval="{{$v->brand_name}}"><span class="brand_name">{{$v->brand_name}}</span></td>
            <td><img src="{{$v->brand_logo}}"></td>
            <td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td>
            <a href="javascript:void(0)" onclick="deleteByID({{$v->brand_id}},this)" class="layui-btn layui-btn-warm">删除</a>
                <a href="{{url('brand/edit/'.$v->brand_id)}}" type="button" type="button" class="layui-btn layui-btn-normal">修改</a>
            </td>
        </tr>

        @endforeach
         <tr>
             <td colspan='7'>{{$data->appends($query)->links('vendor.pagination.admin')}}
                 <button type="button" class="layui-btn layui-btn-normal moredel">批量删除</button>
             </td>

         </tr>
            </tbody>
    </table>

    @endsection
<script src="/static/admin/layui/layui.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
        var form= layui.form;
    });

//全选
$(document).on('click','#all',function(){
  //alert(123);
  var checkval = $('input[name="allcheckbox"]').prop('checked');
  //alert(checkval);
  // $('input[name="brandcheck[]"]').prop('checked',checkval);
  if(checkval){
    $('input[name="brandcheck[]"]').prop('checked',true);
  }else{
    $('input[name="brandcheck[]"]').prop('checked',false);
  }
})


//批量删除
$(document).on('click','.moredel',function(){
  //alert(123);
  var id = new Array();

  $('input[name="brandcheck[]"]:checked').each(function(i,k){
    id.push($(this).val());
  })
  //alert(id);
  $.get('/brand/destroy/',{id:id},function(res){
    alert(res.msg);
    //$.(obj).parents('tr').remove();
    location.reload();
  },'json')
})


        //ajax删除
    function deleteByID(brand_id,obj){
        //alert(brand_id);
        if(!brand_id){
            return ;
        }

        $.get('/brand/destroy/'+brand_id,function(res){
            alert(res.msg);
            //$.(obj).parents('tr').remove();
            localtion.reload();
        },'json')
    }


    //ajax分页
$(document).on('click','.layui-laypage a',function(){
//$('.layui-laypage a').click(function(){
  var url=$(this).attr('href');
   $.get(url,function(res){
     $('tbody').html(res);
      layui.use('element', function(){
        var element = layui.element;
        // var form=.layui.form;
        //form.render();
    });
  })
  return false;
})


//即点即改
$(document).on('click','.brand_name',function(){
  var brand_name=$(this).text();
  var id=$(this).parent().attr('id');
    $(this).parent().html('<input type=text class="changename  input_name_'+id+'" value='+brand_name+'>' );
    $('.input_name_'+id).val('').focus().val(brand_name);
});


$(document).on('blur','.changename',function(){
    //入库
    var newname=$(this).val();
    if(!newname){
        alert("内容不能为空");return;
    }
    var oldval=$(this).parent().attr('oldval');
     if(newname==oldval){
       $(this).parent().html('<span class="brand_name">'+newname+'</span>');
       return;
    }
    var id=$(this).parent().attr('id');
    var obj=$(this);
    $.get('/brand/change',{id:id,brand_name:newname},function(res){
      if(res.code==0){
        obj.parent().html('<span class="brand_name">'+newname+'</span>');
      }
  },'json')
});

</script>

