@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Blog\Article $article */
    @endphp
    <div class="container">
        @include('blog.article.includes.result_messages')

            <form method="POST" action="{{ route('article.store') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.article.includes.article_create_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('blog.article.includes.article_create_add_col')
                    </div>
                </div> 
            </form>                       
    </div>
@endsection  