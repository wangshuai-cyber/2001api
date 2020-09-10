<form action="">
    @csrf
    新闻标题<input type="text" name="title"><br>
    新闻分类
    <select  id="cid">
        @foreach($res as $v)
        <option value="{{$v->cid}}">{{$v->cname}}</option>
            @endforeach
    </select>
    新闻图片<input type="file" name="img"><br>
    新闻简介<input type="text" name="jianjie"><br>
    新闻内容<input type="text" name="content"><br>
    <input type="submit" value="添加">
</form>