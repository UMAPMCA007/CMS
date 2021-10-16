    <div class="container">
        <div class="row col-sm-12 " style="margin-top:50px; ">
          @foreach($pictures as $picture)
            <div class="panel col-sm-4  " style="width:220px;height:380px; margin-left: 45px;">
                    <div class="panel-body ">
                            <img  src="{{ asset('images/'.$picture->image)}}" class="img-thumbnail" alt="..." style="width:250px;height:280px">
                            <p class="offset-sm-4 text-center">{{$picture->title}}</p>
                            <button class="btn btn-success ml-2">Purchase Now</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

