@extends("layouts.shop.default")

@section("title","菜品分类表")

@section("content")
    <form class="form-horizontal" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">menu_name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入分类名称" name="menu_name" value="{{old('menu_name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品编号</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入分类编号" name="type_accumulation" value="{{old('type_accumulation')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">所属商家ID</label>
            <div class="col-sm-4">
                <select name="user_id" style="width: 100px">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入分类描述" name="description" value="{{old('description')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否是默认分类</label>
            <div class="col-sm-4">
                <input type="radio"  name="is_selected" value="0" checked="">是
                <input type="radio"  name="is_selected" value="1">否
            </div>
        </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>

    </form>
@endsection