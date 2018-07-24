@extends("layouts.shop.default")

@section("title","文章列表")

@section("content")
    <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商家名称" name="name" value="{{old('name',$users->name)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputEmail3" placeholder="请输入商家密码" name="password" value="{{old('password',$users->password)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">email</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商家email" name="email" value="{{old('email',$users->email)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">status</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入商家状态" name="status" value="{{old('status',$users->status)}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">shop_id</label>
            <div class="col-sm-4">
                <select name="shop_id">
                    @foreach($shopcontents as $shopcontent)
                        <option value="{{$shopcontent->id}}" {{$users->shop_id==$shopcontent->id?"selected":""}}>{{$shopcontent->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection