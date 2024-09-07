<x-master title="Students">
    <a href="{{ route('students.index')}}" class="btn btn-warning text-light my-3">Back</a>
    <x-card-student :student="$student"/>
    <x-offers-card :offers="$student->offers"  />
</x-master>