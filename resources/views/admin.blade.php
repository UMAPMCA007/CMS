@include('includes.header')
    <div class="header" >
        <div class="col-lg-12 bg-info ml-0 mr-0">
            <a class="navbar-brand " href="/" style="color: coral;">Mobile World</a>
            <h2 class=" col-md-6 offset-md-5 mb-12" >Admin Panel</h2>
        </div>
        <div class="col-md-10 offset-md-1 mr-1">
            @if(Session::get("success"))
                <div class="alert alert-success">
                    {{Session::get("success")}}
                </div>
            @endif
            <form action="{{route('iu')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-6">
                    <div class="col-md-6 offset-md-9 mt-5">
                        <input type="file" name="images" class="form-control mb-2">
                        <input type="text" name="title" class="form-control mb-2" placeholder="Enter your text">
                        <button type="submit" class="btn btn-success offset-md-3">Upload</button>
                    </div>
                </div>
            </form>
    </div>
    <div class="row col-md-12 m-2">
                    @foreach ($photos as $photo)
                        <div class="col-sm-3 col-md-2 mt-5 ml-4">
                            <img class="img-thumbnail bg-dark ml-3 " src="{{ asset('images/'.$photo->image)}}"  style="width:250px;height:250px;"/><br>
                            <p class="text-center">{{$photo->title}}</p>
                            <a href="/edit/{{$photo->id}}" class="btn btn-success ml-5">Edit</a>
                        </div>
                   @endforeach
    </div>
@include('includes.footer')
