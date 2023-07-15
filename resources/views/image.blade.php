<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Laravel 10 multiple upload</h2>
            </div>
            <div class="panel-body">
                @if($message=Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @foreach(\Session::get('image') as $imgs)
                <img src="images/{{$imgs}}">
                @endforeach
                @endif
                <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" name="image[]" class="form-control @error('image.*') is-invalid @enderror" multiple>

                        @error('image.*')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>