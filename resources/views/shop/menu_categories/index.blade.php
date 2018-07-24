@extends("layouts.shop.default")

@section("title","商铺分类列表")

@section("content")

    <a href="{{route('menu_categories.add')}}" class="btn btn-success">添加</a>

    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>菜品编号</td>
            <td>所属商家ID</td>
            <td>描述</td>
            <td>是否是默认分类</td>
            <td>操作</td>
        </tr>
        @foreach($menu_categories as $menu_categorie)
            <tr>
                <td>{{$menu_categorie->id}}</td>
                <td>{{$menu_categorie->menu_name}}</td>
                <td>{{$menu_categorie->type_accumulation}}</td>
                <td>{{$menu_categorie->user_id}}</td>
                <td>{{$menu_categorie->description}}</td>
                <td>{{$menu_categorie->is_selected==0?"是":"否"}}</td>
                <td>
                    <a href="{{route('menu_categories.edit',$menu_categorie)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('menu_categories.del',$menu_categorie)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$menu_categories->links()}}
@endsection