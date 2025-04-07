@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('new') }}">Написать</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Автор</th>
                                    <th>Бриф</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                @php
                                    /** @var \App\Models\Blog\Article $article */
                                @endphp
                                    <td>
                                        <a href="{{ route('article.show', $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(!empty($article->author))
                                            {{ $article->user->name }}
                                        @endif
                                    </td>
                                    <td>{{ $article->brief }}</td>
                                </tr>
                                
                            @endforeach
                            </tbody>
                            <tfood></tfood>
                        </table>
                    </div>
                </div>
            </div>
            @if($articles->total() > $articles->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body pagination">
                                {{ $articles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection   