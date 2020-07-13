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
            <h2 style="font-weight:600;"> Current Locale Is:   {{ Config::get('app.locale') }}
            </h2>
            @if (Config::get('app.locale')=='ar')
            <a href="{{route('en.users.index')}}" class="btn btn-info">Show English Version</a><br><br>
            
            @elseif(Config::get('app.locale')=='en')
            <a href="{{route('ar.users.index')}}" class="btn btn-info">Show Arabic Version</a><br><br>
            
            @endif
            
        <a href="{{route('users.create')}}" class="btn btn-success">Add New</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
 
                            <th>
                                Email
                            </th>
                            <th>
                                Password
                            </th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
<tbody>
@foreach ($users as $user)
<tr>

<td>{{$user->name}}</td>

<td>{{$user->email}}</td>


<td>{{ substr($user->password,0,10)}}</td>
<td> <a href="{{route('users.edit',$user->id)}}">  <button class="btn btn-primary">  Edit</button></a>  </td>
<td>

<form action="{{route('users.destroy',$user->id)}}" style="display:inline-block" method="post">
    @method('DELETE')
@csrf
<button type="submit" class="btn btn-danger">Delete</button>
</form>

</td>


</tr>
@endforeach


</tbody>


                </table>

            </div>


        </div>


    </div>
</body>

</html>
