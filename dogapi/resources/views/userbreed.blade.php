<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog API Example</title>

</head>
<body>
    @php
    $user=DB::table('users')->get();
    $breed=DB::table('breeds')->get();
    $location=DB::table('user_locations')->get();
    $ubs = DB::table('user_favourite_breeds')
                    ->join('users','user_favourite_breeds.user_id','users.id')
                    ->join('breeds','user_favourite_breeds.breed_id','breeds.id')
                    ->join('user_locations','user_favourite_breeds.location_id','user_locations.id')
                    ->select('user_favourite_breeds.*','users.name','breeds.breed','user_locations.city')
                    ->get();
    @endphp
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form  method="post" action="{{ route('user.breed.save') }}">
            @csrf
            <div class="row">
             <div class="col-md-12 col-4">
                <span>Users</span>
                <select name="user">

                    @foreach ($user as $use )
                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-md-12 col-4">
                <span> Breeds</span>
                <select name="breed">
                    @foreach ($breed as $bree)
                    <option value="{{ $bree->id }}">{{ $bree->breed }}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-md-12 col-4">
                 <span> Location</span>
                <select name="location">
                    @foreach ($location as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <button type="submit">Save User Breed</button>
          </form>

          @if ($ubs)

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">User</th>
                  <th class="wd-15p">Location</th>
                  <th class="wd-20p">Breed</th>

                </tr>
              </thead>
              <tbody>
                @foreach($ubs as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->city }}</td>
                  <td>{{$row->breed}} </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
          @endif



<p></p>
    </div>

</body>
</html>
