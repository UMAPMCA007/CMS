@include('includes.header')
<div class="row col-md-12 mt-1">
    <a href="/">
      <span class="glyphicon glyphicon-home col-sm-1 " style="font-size:50px;"></span>
    </a>
       <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-3 mt">
        <h4 class="col-md-offset-4 lc">SIGNUP</h4>
        <form action="{{route('ps')}}" method="post">
            @csrf

            @if(Session::get("success"))
                <div class="alert alert-success">
                    {{Session::get("success")}}
                </div>
            @endif
            @if(Session::get("fail"))
                <div class="alert alert-danger">
                    {{Session::get("fail")}}
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label lc">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label lc">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label lc">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label lc"> Conform password</label>
                <input type="password" class="form-control" name="Cpassword" id="exampleInputPassword1">
                <span class="text-danger">@error('Cpassword'){{$message}}@enderror</span>
            </div>
            <div class=" col-md-offset-4 mtb">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>

