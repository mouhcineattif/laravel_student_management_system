<x-master title="Students">
    <a href="{{route('home')}}" class="my-2 btn btn-dark">Return home</a>
    <div class="row">
        <x-table-students :students="$students"/>
    </div>
</x-master>