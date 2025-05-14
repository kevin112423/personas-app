<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <caption>List of users</caption>
    <a href="{{ route('comunas.create') }}" class="btn btn-success">Add</a>
    <table class="table caption-top">
        <thead>
          <tr>
            <th scope="col">Ccode</th>
            <th scope="col">Comune</th>
            <th scope="col">Municipality</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comunas as $comuna)
                <tr>
                <th scope="row">{{$comuna -> comu_codi}}</th>
                <td>{{$comuna -> comu_nomb}}</td>
                <td>{{$comuna -> muni_nomb}}</td>
                <td>
                    <a href="{{ route('comunas.edit', ['comuna' => $comuna->comu_codi]) }}"
                        class="btn btn-info">Edit</a>
              
                    <form action="{{ route('comunas.destroy', ['comuna' => $comuna->comu_codi]) }}"
                          method="POST" style="display: inline-block">
              
                        @method('delete')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>
</html>