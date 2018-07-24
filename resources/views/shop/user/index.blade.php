@extends("layouts.shop.default")

@section("title","商户信息列表")

@section("content")
    <a href="{{route('user.add')}}" class="btn btn-success">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>商家名称</td>
            <td>商家密码</td>
            <td>商家邮箱</td>
            <td>商家状态</td>
            <td>所属商铺</td>
            <td>操作</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status==0?"成功":"失败"}}</td>
                <td>{{$user->shopcontent->name}}</td>
                <td>
                    <a href="{{route('user.edit',$user)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('user.del',$user)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$users->links()}}
    {{--11111111111--}}
@endsection