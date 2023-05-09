@extends('nav')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>I am from Blog</H1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @isset($blogs)
            @foreach ($blogs as $key=>$blog)
            <tr>
                <td>{{$blog->name}}</td>
                <td>{{$blog->address}}</td>
                <td>{{$blog->phone}}</td>
                <td>
                    <a href="{{ route('blog.edit',$blog->id) }}">edit</a>
                    <a href="{{route('blog.show',$blog->id)}}">show</a>
                    <form action="{{route('blog.destroy',$blog->id)}}" method="POST" id="dlt-form{{$key}}">
                        @csrf
                        @method('delete')
                    </form>
                    <button type="button" onClick="deleteData('#dlt-form{{$key}}')">Delete</button>
                </td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
    <script>
        function deleteData(id){
            $(id).submit();
        }
    </script>
</body>
</html>
@endsection