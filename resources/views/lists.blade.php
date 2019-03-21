@extends('layouts.app')

@section('content')
    <div class="card">
        @if ($userExists)
            <h2 class="card-header">Lists by {{ $user->name }}</h2>
            <div class="card-body p-0">
                <div class="list-group list-group-flush bg-light">
                    @forelse ($lists as $list)
                        <a class="list-group-item list-group-item-action h5" href="lists/{{ $list->id }}">
                            {{ $list->name }}
                            <div class="badge badge-secondary">
                                {{ count($list->movies->toArray()) }} movies
                            </div>
                        </a>
                    @empty
                        <div>No lists found.</div>
                    @endforelse
                </div>
            </div>
        @else
            <h2 class="card-header">This user does not exist.</h2>
        @endif
    </div>
@endsection
