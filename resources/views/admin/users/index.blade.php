@extends('layouts.app')

@section('title', 'Admin: Users')

@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/users.css')}}">
@endpush

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <tr>
                <th>ID</th>
                <th>AVATAR</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PURPOSE</th>
                <th>GENDER</th>
                <th>STATUS</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_users as $user)
                <tr>
                    {{-- ID --}}
                    <td>{{ $user->id }}</td>
                    {{-- アバター（なければアイコン） --}}
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->username }}" class="rounded-circle d-block mx-auto avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                        @endif
                    </td>
                    {{-- ユーザーネーム（プロフに飛ぶリンク） --}}
                    {{-- {{ route('profile.show', $user->id )}} --}}
                    <td>
                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $user->username }}</a>
                    </td>
                    {{-- メールアドレス --}}
                    <td>{{ $user->email }}</td>
                    {{-- 目的 --}}
                    <td>{{ $user->purpose }}</td>
                    {{-- 性別 --}}
                    <td>{{ $user->gender }}</td>
                    {{-- ステータス（状態） "Inactive" か "Active"--}}
                    <td>
                        @if ($user->trashed())
                            <i class="fa-regular fa-circle text-secondary"></i> &nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-success"></i> &nbsp; Active
                        @endif
                    </td>
                    {{-- ステータスを"deactivate"か"activate"するボタンを表示するためのドロップダウン --}}
                    {{-- deactivateとは、ソフトデリート（レコードとしては残す）を指す！ --}}
                    <td>
                        @if (Auth::user()->id !== $user->id)
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @if ($user->trashed()) {{-- Activate --}}
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#activate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-check"></i> Activate {{ $user->name }}
                                        </button>
                                    @else  {{-- Deactivate --}}
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate {{ $user->name }}
                                        </button>
                                    @endif
                                </div>
                                {{-- モーダルをインクルード　Include the modal here --}}
                                @include('admin.users.modal.status')
                            </div>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->id !== $user->id)
                            {{-- Delete Button モーダル開く--}}
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#permanently-delete-user-{{ $user->id }}" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        @endif
                        {{-- モーダルをインクルード　Include the modal here --}}
                        @include('admin.users.modal.action')
                    </td>
                </tr>
                
            @endforeach 
        </tbody>
    </table>

    {{-- ページ割り付け　Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $all_users->links() }}
    </div>
@endsection