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


        <form name="myform"  method="post" action="{{ route('dog.image') }}">
            @csrf
            @if (isset($jsonData))
            <select name='breed'>
            @foreach ($jsonData->message as $key=>$message)
            <h3>Breeds Name:  </h3>
                <option value="{{ $key }}">{{ $key }}</option>

            @endforeach
        </select>
            @endif
            <button type="submit">Get Random Breed</button>
          </form>
          @if (isset($image))
          <img src="{{ $image->message }}">
          @endif





<p></p>
    </div>

</body>
</html>
