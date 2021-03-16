<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog API Example</title>

</head>
<body>
    <div class="container">


        <form   method="post" action="{{ route('dog.list') }}">
            @csrf
            <button type="submit">Get Dog List</button>
            <a href=""></a>
          </form>
          <h1>Dog list </h1>

            @if (isset($jsonData))
            <select id="breed">
            @foreach ($jsonData->message as $key=>$message)
            <h3>Breeds Name:  </h3>

                <option value="{{ $key }}">{{ $key }}</option>


            @endforeach
        </select>
            @endif




<p></p>
    </div>

</body>
</html>
