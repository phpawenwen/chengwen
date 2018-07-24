@extends("layouts.admin.default")

@section("title","管理员列表")

@section("content")
    <a href="{{route('admins.add')}}" class="btn btn-success">添加</a>
    <a href="{{route('shopty.index')}}" class="btn btn-primary">分类信息</a>
    <a href="{{route('shopcon.index')}}" class="btn btn-danger">商家商铺信息</a>
    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>管理员名称</td>
            <td>管理员密码</td>
            <td>管理员邮箱</td>
            <td>操作</td>
        </tr>
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->password}}</td>
                <td>{{$admin->email}}</td>
                <td>
                    <a href="{{route('admins.edit',$admin)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('admins.del',$admin)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{$admins->links()}}

    {{--11111111111--}}
@endsection