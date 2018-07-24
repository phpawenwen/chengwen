@extends("layouts.admin.default")

@section("title","文章列表")

@section("content")
    <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入管理员名称" name="name" value="{{old('name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputEmail3" placeholder="请输入管理员密码" name="password" value="{{old('password')}}">
            </div>
        </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>

    </form>
@endsection