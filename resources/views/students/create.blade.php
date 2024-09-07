<x-master title="Add Student">
    @if(count($errors)>0)
    <x-alert type='danger'>
        <h5>Errors: </h5>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </x-alert>
    @endif
    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Student Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="name"/>
            <small id="helpId" class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Student Job</label>
            <input type="text" name="filiere" class="form-control" placeholder="job" value="{{ old('filiere')}}"/>
        </div>
        <div class="mb-3">
            <label  class="form-label">Date Of Birth</label>
            <input
            type="date" name="date_de_naissance" value="{{ old('date_de_naissance')}}" class="form-control"/>
            <small id="helpId" class="text-muted">Enter the student date of birth</small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password"/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="confirm student password"/>
        </div>
        <div class="mb-3">
            <label  class="form-label">Student Code</label>
            <input
                type="text" name="massar" value="{{ old('massar')}}" class="form-control" placeholder="code"/>
                <small id="helpId" class="text-danger">
                    @error('massar')
                        {{$message}}
                    @enderror
                </small>
        </div>
        <div class="mb-3">
            <label  class="form-label">Student Profile Picture</label>
            <input  type="file" name="image" class="form-control" placeholder="code">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-block btn-primary">Insert</button>
        </div>
    </form>
</x-master>