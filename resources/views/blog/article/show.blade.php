@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Blog\Article $article */
    @endphp
    <div class="container">
        @if($article->exists)
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h1 class="cart-title text-center">{{ $article->title }}</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                @if(!empty($article->user))
                                    <h5 class="card-title">Author: 
                                        <spam class="card-subtitle text-muted">{{ $article->user->name }}</spam>
                                    </h5>
                                @endif    
                                <div class="card-text">{{ $article->fullText }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endif                        
    </div>
@endsection  