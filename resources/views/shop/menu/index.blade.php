@extends("layouts.shop.default")

@section("title","菜品信息列表")

@section("content")
    <a href="{{route('menu.add')}}" class="btn btn-success">添加</a>

    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>名称</td>
            <td>评分</td>
            <td>所属商家ID</td>
            <td>所属分类ID</td>
            <td>价格</td>
            <td>描述</td>
            <td>月销量</td>
            <td>评分数量</td>
            <td>提示信息</td>
            <td>满意度数量</td>
            <td>满意度评分</td>
            <td>商品图片</td>
            <td>状态：1上架，0下架</td>
            <td>操作</td>
        </tr>
        @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->rating}}</td>
                <td>{{$menu->shop_id}}</td>
                <td>{{$menu->category_id}}</td>
                <td>{{$menu->goods_price}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->month_sales}}</td>
                <td>{{$menu->rating_count}}</td>
                <td>{{$menu->tips}}</td>
                <td>{{$menu->satisfy_count}}</td>
                <td>{{$menu->satisfy_rate}}</td>

                <td> @if($menu->goods_img)
                        <img src="/uploads/{{$menu->goods_img}}" width="80" height="50">
                    @else
                        <img src="/uploads/images/ddddvv.jpg" width="80px" height="50px">
                    @endif</td>
                <td>{{$menu->status==0?"上架":"下架"}}</td>
                <td>
                    <a href="{{route('menu.edit',$menu)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('menu.del',$menu)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$menus->links()}}
    {{--11111111111--}}
@endsection