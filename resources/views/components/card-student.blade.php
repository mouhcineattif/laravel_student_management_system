@props(['student'])
<div class='container'>
    @php
        $id = $student->id;
    @endphp
    <div class="card col-6 d-flex w-50 m-auto my-3 p-5 text-center bg-light">
        <img class="card-img-top w-50 mx-auto h-50" style="border-radius: 50%" src="{{ asset("storage/".$student->image) }}" height="500" width="200" alt="{{ $student->image }}" />
        <div class="card-body">
            <h4 class="card-title">{{$student->name}}</h4>
            <p class="card-text">{{$student->filiere}}</p>
        </div>
        
        <div class="card-footer text-muted">Created at {{$student->created_at->format('Y-m-d')}}</div>
        <div class="card-footer text-muted">Last Update {{$student->updated_at->format('Y-m-d')}}</div>
        <div class="card-footer d-flex gap-2">
            <form action="{{ route('students.destroy',$student->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <form action="{{ route('students.edit',$student->id)}}" method="get">
                @csrf
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
        
    </div>
    {{-- <div class="row">
        <h1>Offers</h1>
        {{ dd($student->offers }}
    </div> --}}
</div>