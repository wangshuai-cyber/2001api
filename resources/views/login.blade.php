<form action="{{url('login_do')}}" method="post">
    @csrf
    用户名：<input type="text" name="user_name">
    密码：<input type="password" name="user_pwd">
    <input type="submit" value="登录">
</form>