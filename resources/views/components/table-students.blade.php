@props(['students'])
<div class="row">
    @foreach($students as $student)
    <div class='container col-sm-4 my-2'>
        @php
            $id = $student->id;
        @endphp
        <div class="card">
            <img class="card-img-top" src="{{ asset("storage/".$student->image) }}" height="500" width="200" alt="{{ $student->image }}" />
            <div class="card-body">
                <h4 class="card-title">{{$student->name}}</h4>
                <p class="card-text">{{$student->filiere}}</p>
            </div>
            
            <div class="card-footer text-muted">Created at {{$student->created_at}}</div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('students.show',$student->id)}}" class='btn btn-primary'>Show</a>
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
        
    </div>
    @endforeach
    
    {{$students->links()}}
</div>