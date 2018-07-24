@extends("layouts.shop.default")

@section("title","商铺信息列表")

@section("content")
    <a href="{{route('shopcontent.add')}}" class="btn btn-success">添加</a>

    <table class="table table-bordered table-hover">
        <tr>
            <td>id</td>
            <td>商铺地址</td>
            <td>商铺类型</td>
            <td>商铺名字</td>
            <td>商铺品牌</td>
            <td>是否保标记</td>
            <td>是否票标记</td>
            <td>是否准标记</td>
            <td>商铺简介</td>
            <td>优惠信息</td>
            <td>商铺状态</td>
            <td>配送方式</td>
            <td>起送价</td>
            <td>logo</td>
            <td>操作</td>
        </tr>
        @foreach($shopcontents as $shopcontent)
            <tr>
                <td>{{$shopcontent->id}}</td>
                <td>{{$shopcontent->dizhi}}</td>
                <td>{{$shopcontent->shoptype->name}}</td>
                <td>{{$shopcontent->name}}</td>
                <td>{{$shopcontent->pinpai}}</td>
                <td>{{$shopcontent->bao==0?"有保证":"没保证"}}</td>
                <td>{{$shopcontent->piao==0?"有发票":"没发票"}}</td>
                <td>{{$shopcontent->zhun==0?"准点到":"不准点"}}</td>
                <td>{{$shopcontent->content}}</td>
                <td>{{$shopcontent->youhuixinxi}}</td>
                <td>@if($shopcontent->status==0)
                        已通过
                    @endif
                    @if($shopcontent->status==1)
                        待审核
                    @endif
                    @if($shopcontent->status==2)
                        为通过
                    @endif
                </td>
                <td>{{$shopcontent->peisongfangshi}}</td>
                <td>{{$shopcontent->start_send}}</td>

                <td>
                    @if($shopcontent->logo)
                        <img src="/uploads/{{$shopcontent->logo}}" width="80" height="50">
                    @else
                        <img src="/uploads/images/ddddvv.jpg" width="80px" height="50px">
                    @endif
                </td>
                <td>
                    <a href="{{route('shopcontent.edit',$shopcontent)}}" class="btn btn-primary">编辑</a>
                    <a href="{{route('shopcontent.del',$shopcontent)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$shopcontents->links()}}
    {{--11111111111--}}
@endsection