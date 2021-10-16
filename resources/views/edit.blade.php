@include('includes.header')
<div class="container">
    <div class="row col-md-12">
          <div class="col-md-6 offset-md-5 mt-5">
                 <img class="col-md-4 4 img-thumbnail " src="{{ asset('images/'.$details->image)}}" />
          </div>
    </div>
    <div class="col-md-6 offset-md-3 mt-2"><br><br>
        <form action="/update/{{$details->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldImages"  value="{{$details->image}}">
            <input type="file" name="images" class="form-control mb-2">
            <input type="text" name="title" class="form-control" value="{{$details->title}}">
            <button class="btn btn-success offset-md-5 mt-3">Update</button>
        </form>
    </div>
</div>
@include('includes.footer')
