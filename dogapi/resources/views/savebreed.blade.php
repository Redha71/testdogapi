<body>
    <div class="container">


        <form   method="post" action="{{ route('dog.save') }}">
            @csrf
            <button type="submit">Save Dog</button>
            <a href=""></a>
          </form>
          <h1>Save Dog list </h1>

            @if(isset($getbreed))
                <div class="row">
                    @foreach ($getbreed as $item)
                        <div class="col-md-12 col-4">

                                <h3>Breeds Save Name:  </h3>
                                    <p>{{ $item->breed }}</p>

                        </div>
                    <div class="col-md-12 col-4">
                        <h3>Sub Breeds Save Name:  </h3>
                        <p>{{ $item->sub_breed }}</p>
                    </div>
                    <div class="col-md-12 col-4">
                        <h3>Image:  </h3>
                        <img src="{{$item->image  }}" style="width: 60px;height:60px;">

                    </div>
                    @endforeach

                </div>
            @else
                <div class="row">
                    @if(isset($jsonData))
                        @foreach ($jsonData->message as $key=>$message)
                            <div class="col-md-12 col-4">
                                    <h3>Breeds API Name:  </h3>
                                        <p>{{ $key }}</p>
                            </div>
                            @foreach ($message as $item)
                                @if($item)
                                <div class="col-md-12 col-8">
                                    <h3>Breeds API Name:  </h3>
                                    <p>{{ $item }}</p>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                   @endif
                </div>
            @endif


    </div>

</body>
</html>
