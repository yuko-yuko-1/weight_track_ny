@extends('layouts.app')
 
@section('title', 'Admin: Communities')

@section('content')
<!-- Form 新規のコミュニティを追加するフォーム　-->
<form action="{{ route('admin.communities.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row gx-2 mb-4">
        <div class="col-4">
            <input type="text" name="name" class="form-control" placeholder="Add a community..." value="{{ old('name')}}" autofocus>
            {{-- Error --}}
            @error('name')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            {{-- イメージの登録・更新 --}}
            <input type="file" name="image" id="image" class="form-control form-control-sm mt-1" aria-describedby="image-info">
            {{-- Error --}}
            @error('image')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Add
            </button>
        </div>
    </div>
</form>
    

{{-- 登録済みのコミュニティを一覧表示するテーブル --}}
<div class="row">
    <div class="col-7">
        <table class="table table-hover align-middle bg-white border text-secondary table-sm text-center">
            <thead class="table-warning text-secondary">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>LAST UPDATED</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_communities as $community)
                    <tr>
                        {{-- コミュニティのID --}}
                        <td>{{ $community->id }}</td>
                        {{-- コミュニティ名--}}
                        <td class="text-dark">{{ $community->name }}</td>
                        {{-- イメージ --}}
                        <td>
                            @if ($community->image)
                                <img src="{{ asset('images/community/' . $community->image) }}" alt="{{ $community->name }}" class="rounded-circle d-block mx-auto avatar-md">
                            @else
                                <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                            @endif
                        </td>
                        {{-- 最終更新日 --}}
                        <td>{{ $community->updated_at }}</td>
                        {{-- 編集モーダルへと削除モーダルへのボタン--}}
                        <td>
                            {{-- Edit Button モーダル開く--}}
                            <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-community-{{ $community->id }}" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            {{-- Delete Button モーダル開く--}}
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-community-{{ $community->id }}" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    {{-- モーダルのインクルード　Include modal here --}}
                    @include('admin.communities.modal.action')
                @empty  {{-- コミュニティがまだ１つもなければ... --}}
                    <tr>
                        <td colspan="5" class="lead text-muted text-center">No communities found.</td>
                    </tr> 
                @endforelse
            </tbody>
        </table>

        {{-- ページ割り付け　Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $all_communities->links() }}
        </div>

    </div>
</div>
    



@endsection