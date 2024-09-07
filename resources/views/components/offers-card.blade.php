@props(['offers'])
{{-- {{dd($offers)}} --}}
<div class='container'>
    <h1 class="text-center">Offers: </h1>
    @foreach ($offers as $offer)
    <div class="card col-6 d-flex w-50 m-auto my-3 p-5 text-center bg-light">
        <h4 class="card-title">{{$offer->title}}</h4>
        <img class="card-img-top h-50 w-100 img-fluid "  src="{{ asset("storage/".$offer->media) }}" height="500" width="200" alt="{{ $offer->image }}" />
        <div class="card-body">
            
            <p class="card-text">{{$offer->description}}</p>
        </div>    
        <div class="card-footer text-muted">Created at {{$offer->created_at}}</div>
        <div class="card-footer d-flex gap-2">
            @can('update', $offer)
            <form action="{{ route('offers.destroy',$offer->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endcan
           @can('delete', $offer)
           <form action="{{ route('offers.edit',$offer->id)}}" method="get">
            @csrf
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
           @endcan
         
        </div>
        
    </div>
    @endforeach
    
</div>