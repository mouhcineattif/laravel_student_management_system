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
    <form action="{{ route('offers.update',$offer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>Edit Offer</h1>
            <label for="" class="form-label">Offer Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title',$offer->title)}}" placeholder="title of the offer"/>
            <small id="helpId" class="text-danger">
                @error('title')
                    {{$message}}
                @enderror
            </small>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control">
                {{ old('description',$offer->description)}}
            </textarea>
            {{-- <input type="text" name="filiere" class="form-control" placeholder="job" value="{{ old('filiere')}}"/> --}}
        </div>
        <div class="mb-3">
            <label  class="form-label" >Offer Type</label>
            <select name="offer_type" class="form-control" id="">
                <option value="0">Select a type</option>
                <option value="intership">Intership</option>
                <option value="work">Work</option>
                <option value="end study project">End Of Study Project</option>
            </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input  type="file" name="media" class="form-control" placeholder="code">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-block btn-primary">Update</button>
        </div>
    </form>
</x-master>