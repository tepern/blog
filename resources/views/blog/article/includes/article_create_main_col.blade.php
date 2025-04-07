@php
    /** @var \App\Models\Blog\Article $article */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">      
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#add_data" role="tab">Бриф</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ $article->title ?? old('title') }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="fullText">Статья</label>
                                <textarea name="fullText"
                                          id="fullText"
                                          class="form-control"
                                          rows="20">{{ $article->fullText ?? old('fullText') }}
                                </textarea>           
                            </div>
                        </div>
                        <div class="tab-pane" id="add_data" role="tabpanel">
                            <div class="form-group">
                                <label for="brief">Бриф</label>
                                <textarea name="brief"
                                          id="brief"
                                          class="form-control"
                                          rows="3">{{ $article->brief ?? old('brief') }}
                                </textarea>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>