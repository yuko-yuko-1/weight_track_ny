@extends('layouts.app')

@section('title', 'Admin: Posts')

@push('css')
<link rel="stylesheet" href="{{ asset('css/admin/posts.css')}}">
@endpush

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="table-primary text-secondary">
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>AVATAR</th>
                <th>OWNER</th>
                <th>TITLE</th>
                <th>POSTED DATE</th>
                <th>COMMUNITY</th>
                <th>STATUS</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all_posts as $post)
                <tr>
                    {{-- ポストのID --}}
                    <td class="text-end">{{ $post->id }}</td>
                    {{-- 投稿画像(リンクで投稿詳細へ飛ぶ) --}}
                    <td>
                        <a href="{{ route('post.show', $post->id)}}">
                            <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="d-block mx-auto image-lg">
                        </a>
                    </td>
                    {{-- アバター（なければアイコン） --}}
                    <td>
                        @if ($post->user->avatar)
                            <img src="{{ asset('images/Profile/' . $post->user->avatar) }}" alt="{{ $post->user->username }}" class="rounded-circle d-block mx-auto avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                        @endif
                    </td>
                    {{-- 投稿者 --}}
                    <td>
                        {{ $post->user->username }}
                    </td>
                    {{-- タイトル --}}
                    <td>
                        <a href="{{ route('post.show', $post->id)}}" class="text-decoration-none text-dark">
                            {{ $post->title }}
                        </a>
                    </td>
                    {{-- 作成日 --}}
                    <td>{{ $post->created_at }}</td>
                    {{-- コミュニティ --}}
                    <td>
                        <a href="{{ route('community_all_posts', $post->community->id )}}" class="text-decoration-none text-dark">
                            {{ $post->community->name }}
                        </a>
                    </td>
                    {{-- ステータス（状態） "Hidden" か "Visible"--}}
                    <td>
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle-minus text-secondary"></i> &nbsp; Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp; Visible
                        @endif
                    </td>
                    {{-- ステータスを"unhide"か"hide"するボタンを表示するためのドロップダウン --}}
                    {{-- hideとは、ソフトデリート（レコードとしては残す）を指す！ --}}
                    <td>
                        {{-- @if (Auth::user()->id !== $post->user->id) --}}
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @if ($post->trashed()) {{-- unhide --}}
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#unhide-post-{{ $post->id }}">
                                            <i class="fa-solid fa-eye"></i> Unhide Post {{ $post->id }}
                                        </button>
                                    @else  {{-- hide --}}
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-{{ $post->id }}">
                                            <i class="fa-solid fa-eye-slash"></i> Hide Post {{ $post->id }}
                                        </button>
                                    @endif
                                </div>
                                {{-- モーダルをインクルード　Include the modal here --}}
                                @include('admin.posts.modal.status')
                            </div>
                        {{-- @endif --}}
                    </td>
                    <td>
                        {{-- @if (Auth::user()->id !== $user->id) --}}
                            {{-- Delete Button モーダル開く--}}
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#permanently-delete-post-{{ $post->id }}" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        {{-- @endif --}}
                        {{-- モーダルをインクルード　Include the modal here --}}
                        @include('admin.posts.modal.action')
                    </td>
                </tr>
            @empty  {{-- 投稿がまだ１つもなければ... --}}
                <tr>
                    <td colspan="9" class="lead text-muted text-center">No posts found</td>
                </tr> 
            @endforelse
        </tbody>
    </table>

    {{-- ページ割り付け　Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $all_posts->links() }}
    </div>
@endsection