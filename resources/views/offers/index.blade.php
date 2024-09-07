<x-master title="Students">
    <a href="{{route('home')}}" class="my-2 btn btn-dark">Return home</a>
    <div class="row">
        @foreach ($offers as $offer)
        <div class='container'>
            <div class="card col-6 d-flex w-50 m-auto my-3 p-5 text-center bg-light" style="border-radius: 19px !important">
                <div class="card-header bg-light text-success" style="border-radius: 19px !important">
                    <div class="container-fluid px-1  d-flex align-items-center" style="border-radius: 19px !important">
                        <img src="{{asset("storage/".$offer->student->image)}}" class="rounded-circle  float-start" width="50" alt="">
                        <h4 class="float-start mx-2">{{ $offer->student->name}}</h3>
                    </div>
                </div>
                <hr>
                @if (!is_null($offer->media))  
                <img class="card-img-top img-fluid"src="{{ asset("storage/".$offer->media) }}" style="border-radius: 19px !important" height="500" width="200" alt="{{ $offer->title }}" />
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{$offer->title}}</h4>
                    <p class="card-text">{{$offer->description}}</p>
                </div>   
                <div class="card-footer text-muted" style="border-radius: 19px !important">Posted at {{$offer->created_at}}</div>
                @if ($offer->student_id === auth()->id())
                <div class="card-footer d-flex gap-2">
                    <form action="{{ route('offers.destroy',$offer->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really Want to delete this Offer ?')">Delete</button>
                    </form>
                    <form action="{{ route('offers.edit',$offer->id)}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success">Edit</button>
                    </form>
                </div>
                @endif
                
                
            </div>
            
        </div>
            
        @endforeach
    </div>
</x-master>