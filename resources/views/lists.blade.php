@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 class="card-header">Lists</h2>
        <div class="card-body p-0">
            <div class="list-group list-group-flush bg-light">
                @if ($userExists)
                    @forelse ($lists as $list)
                        <a class="list-group-item list-group-item-action h5" href="">
                            {{$list->name}}
                        </a>
                    @empty
                        <div>No lists found.</div>
                    @endforelse
                @else
                    <div>This user does not exist.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
