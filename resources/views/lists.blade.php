@extends('layouts.app')

@section('content')
    @if ($userExists)
        <div class="card">
            <h2 class="card-header">Lists <small>by {{ $user->name }}</small></h2>
            <div class="card-body p-0">
                <div class="list-group list-group-flush bg-light">
                    @forelse ($lists as $list)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between py-0">
                            <a class="col h5 text-dark m-0 py-3" href="/user/{{ $user->id }}/lists/{{ $list->id }}">
                                {{ $list->name }}
                                <div class="badge badge-secondary ml-3">
                                    {{ count($list->movies->toArray()) }} movies
                                </div>
                            </a>
                            @if ($isUserOwner)
                                <div class="d-flex flex-column justify-content-around">
                                    <form action="/user/{{ $user->id }}/lists/{{ $list->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">X</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="p-3">No lists found.</div>
                    @endforelse
                </div>
            </div>
        </div>
        @if ($isUserOwner)
            <div class="pt-3">
                <form action="/user/{{ $user->id }}/lists" method="POST">
                    @method('POST')
                    @csrf
                    <div class="input-group">
                        <input type="text" placeholder="Name" name="name" class="form-control col-3">
                        <button class="btn btn-success ml-3">New list</button>
                    </div>
                </form>
            </div>
        @endif
    @else
        <h2 class="card-header">This user does not exist.</h2>
    @endif
@endsection
