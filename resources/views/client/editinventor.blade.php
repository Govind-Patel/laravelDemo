<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="">
    <div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <a href="{{'/'}}" class="btn btn-primary">Back</a>
        <h3 class="text-center">Update inventor</h3>
                {{-- <?php dd($inventor[0]->name); ?> --}}
        <form action="{{ url('updateEvent',$subinventor->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$subinventor->name}}"
                    class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" name="contact" value="{{$subinventor->contact }}"
                    class="form-control @error('contact') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Contact">
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('contact') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="{{$subinventor->email}}"
                    class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputPassword1" placeholder="Password">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                {{-- <?php dd($inventor->id); ?> --}}
                <select name="inventors_id" class="form-control">
                    <option>--select--</option>
                    {{-- <?php if($inventor->id == $inventor->id){ ?>
                        <option value="{{$inventor->id}}">{{$inventor->name}}</option>
                   <?php } ?> --}}

                    @foreach ($inventor as $key)
                        <option value="{{$key->id}}" {{$key->id == $subinventor->inventors_id ? 'selected' : ''}}>{{$key->name}}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
