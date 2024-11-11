@extends('home.layouts')

@section('content')
    <div class=" px-4 sm:px-6 lg:px-8"> <!-- Added px-4 for padding on small screens -->
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center text-gray-700">
                        <h4>Your Posts</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('posts.create') }}"
                            class="btn btn-primary focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            Add Post</a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                        <table class="text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Title</th>
                                    <th scope="col" class="px-6 py-3">Image</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="bg-white border-b">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $post->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('images/' . $post->image) }}" width="80">
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="Post">
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-success">Edit</a>
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="btn btn-success">View</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
