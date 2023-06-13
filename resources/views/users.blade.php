<h1>Something</h1>
{{-- <a href="{{ url('/') }}">Go to home</a> Never ever use it --}}
<a href="{{ route('home') }}">Go to home</a>
{{-- {{ dd($users) }} --}}

@foreach ($users as $user)
    <h1>{{ $user }}</h1>
@endforeach

{{-- hi --}}
