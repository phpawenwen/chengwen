@extends("layouts.shop.default")

@section("title","商铺分类列表")

@section("content")

    <a href="{{route('shoptype.add')}}" class="btn btn-success">添加</a>

    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>分类姓名</td>
            <td>logo</td>
            <td>操作</td>
        </tr>
        @foreach($shoptypes as $shoptype)
            <tr>
                <td>{{$shoptype->id}}</td>
                <td>{{$shoptype->name}}</td>
                <td>
                    @if($shoptype->logo)
                        <img src="/uploads/{{$shoptype->logo}}" width="120" height="70">
                    @else
                        <img src="/uploads/images/ddddvv.jpg" width="120px" height="60px">
                    @endif
                </td>
                <td>
                    <a href="{{route('shoptype.edit',$shoptype)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('shoptype.del',$shoptype)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$shoptypes->links()}}
@endsection