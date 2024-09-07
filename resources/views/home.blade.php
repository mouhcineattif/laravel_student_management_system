<x-master title='Home'>
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Welcome to Student management System</h1>
        <p>Create,Edit,Update,Delete your Students</p>
        <a href="{{route('students.index')}}" class="btn btn-success">View Students</a>
        <a href="{{route('offers.index')}}" class="btn btn-warning text-light">View Offers</a>
      </div>
</x-master>
