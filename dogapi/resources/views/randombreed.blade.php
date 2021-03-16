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


        <form name="myform"  method="post" action="{{ route('dog.random') }}">
            @csrf
            <button type="submit">Get Random Breed</button>
          </form>
          <h1>Random Breed </h1>
            @if (isset($jsonData))
        
<img src="{{ $jsonData->message }}">


            @endif



<p></p>
    </div>

</body>
</html>
