<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="container" style="margin-top:10%;">
            <h2>Current Locale : {{Config::get('app.locale')}}</h2>
            
@if (Config::get('app.locale')=='ar')
<a href="{{route('en.users.edit',$user->id)}}" class="btn btn-success">Edit English Version</a><br><br>

@elseif(Config::get('app.locale')=='en')
<a href="{{route('ar.users.edit',$user->id)}}" class="btn btn-success">Edit Arabic Version</a><br><br>

@endif
            <div class="table-responsive">
              <form action="{{route('users.update',$user->id)}}" method="post">
                {{-- <input type="hidden" name="_method"  value="PUT"> --}}
                @method('PUT')
             @csrf
              <div class="form-group">
              <input type="text" class="form-control" value="{{$user->name}}" placeholder="Name" name="name">
              
              </div>
              
              <div class="form-group">
              <input type="email" class="form-control" value="{{$user->email}}" placeholder="Email" name="email">
              
              </div>

              
              <div class="form-group">
                <input type="password" class="form-control" value="" placeholder="Password" name="password">
                
                </div>
<input type="submit" class="btn btn-info" value="Update User">
              </form>
            </div>


        </div>


    </div>
</body>

</html>
