@extends('theme.master')
@section('title', 'My Blogs')
@section('content')
    @include('theme.partials.hero', ['title' => 'My Blogs'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogDeleteStatus'))
                        <div class="alert alert-success">
                            {{ session('blogDeleteStatus') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"width="5%">#</th>
                                <th scope="col">Title</th>
                                <th scope="col"width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $blog->id }}</th>
                                        <td>
                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}"
                                                target="_blank">{{ $blog->title }}</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary mr-2"
                                                href="{{ route('blogs.show', ['blog' => $blog]) }}">Edit</a>
                                            <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="post"
                                                id="delete_form_{{ $blog->id }}" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-sm btn-danger mr-2"
                                                    href="javascript:$('#delete_form_{{ $blog->id }}').submit();">Delete</a>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    @if (count($blogs) > 0)
                        {{ $blogs->render('pagination::bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
