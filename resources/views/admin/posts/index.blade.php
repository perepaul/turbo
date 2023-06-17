@extends('layouts.back')
@section('title','Posts')
@section('content')
<div class="col-md-10 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between w-100">
                <h6 class="card-title">
                    @yield('title')
                </h6>
                <a href="{{route('admin.post.create')}}" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-plus"></i> Add post
                </a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Excerpt</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{Str::limit($post->excerpt,150)}}</td>
                            <td><img src="{{asset(config('dir.posts').$post->image)}}" style="width:40px"></td>
                            <td>{{$post->link}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="dropdown fs-12">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item view" href="{{route('admin.post.edit',$post->id)}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">
                                                <i class="fa fa-times"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No posts found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
