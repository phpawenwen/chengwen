@extends("layouts.shop.default")

@section("title","文章列表")

@section("content")
    <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">goods_name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="名称" name="goods_name" value="{{old('goods_name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">rating</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="评分" name="rating" value="{{old('rating')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">shop_id</label>
            <div class="col-sm-4">
                <select name="shop_id">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">menu_categorie</label>
            <div class="col-sm-4">
                <select name="category_id">
                    @foreach($menu_categories as $menu_categorie)
                        <option value="{{$menu_categorie->id}}">{{$menu_categorie->menu_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">goods_price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入价格" name="goods_price" value="{{old('goods_price')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">description</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入描述" name="description" value="{{old('description')}}">
            </div>
        </div>


        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">month_sales</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入月销量" name="month_sales" value="{{old('month_sales')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">peisongfangshi</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="评分数量" name="rating_count" value="{{old('rating_count')}}">
            </div>

        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">tips</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入提示信息" name="tips" value="{{old('tips')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">satisfy_count</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="请输入满意度数量" name="satisfy_count" value="{{old('satisfy_count')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">satisfy_rate</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="满意度评分" name="satisfy_rate" value="{{old('satisfy_rate')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">goods_img</label>
            <div class="col-sm-10">
              <input type="file" name="goods_img">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">status</label>
            <div class="col-sm-10">
                <input type="radio" name="status" value="0" checked="checked">上架
                <input type="radio" name="status" value="1">下架
            </div>
        </div>




            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>

    </form>
@endsection