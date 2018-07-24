@extends("layouts.shop.default")

@section("title","文章列表")

@section("content")
    <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商家名称" name="name" value="{{old('name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputEmail3" placeholder="请输入商家密码" name="password" value="{{old('password')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">email</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商家email" name="email" value="{{old('email')}}">
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<label for="inputEmail3" class="col-sm-2 control-label">shop_id</label>--}}
        {{--<div class="col-sm-4">--}}
        {{--<select name="shop_id">--}}
        {{--@foreach($shopcontents as $shopcontent)--}}
        {{--<option value="{{$shopcontent->id}}">{{$shopcontent->name}}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">dizhi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商铺地址" name="dizhi" value="{{old('dizhi')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">shoptype_id</label>
            <div class="col-sm-4">
                <select name="shoptype_id">
                    @foreach($shoptypes as $shoptype)
                        <option value="{{$shoptype->id}}">{{$shoptype->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商铺姓名" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">pinpai</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商铺品牌" name="pinpai" value="{{old('pinpai')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">bao</label>
            <div class="col-sm-10">
                <input type="radio" name="bao" value="0" checked="checked">有保证
                <input type="radio" name="bao" value="1">没保证
                {{--<input type="text" class="form-control" id="inputEmail3" placeholder="是否有保证" name="bao" value="{{old('bao')}}">--}}
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">piao</label>
            <div class="col-sm-4">
                <input type="radio" name="piao" value="0" checked="checked">有发票
                <input type="radio" name="piao" value="1">没发票
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">zhun</label>
            <div class="col-sm-10">
                <input type="radio" name="zhun" value="0" checked="checked">准点到
                <input type="radio" name="zhun" value="1">不准点
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">content</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输商铺简介" name="content" value="{{old('content')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">youhuixinxi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入优惠信息" name="youhuixinxi" value="{{old('youhuixinxi')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">status</label>
            <div class="col-sm-10">
                <input type="radio" name="status" value="0" checked="checked">以通过
                <input type="radio" name="status" value="1">待审核
                <input type="radio" name="status" value="2">未通过
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">peisongfangshi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入配送方式" name="peisongfangshi" value="{{old('peisongfangshi')}}">
            </div>

        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">start_send</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入起送价" name="start_send" value="{{old('start_send')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">logo</label>
            <div class="col-sm-10">
                <input type="file" name="logo">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">status</label>
            <div class="col-sm-10">
                <input type="radio" name="status" value="0" checked="checked">以通过
                <input type="radio" name="status" value="1">待审核
                <input type="radio" name="status" value="2">未通过
            </div>
        </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection