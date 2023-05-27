@extends('layouts.admin_layout')

@section('title', 'Добавить пост')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пост</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary" style="position: absolute; display: flex; flex-direction: column;  margin-left: 50%">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                       placeholder="Введите заголовок поста">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Изображение</label>
                                <input type="text" name="preview_img" class="form-control" id="preview_img"
                                       placeholder="Введите путь к изображению">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Текст поста</label>
                                <input type="text" name="post_text" class="form-control" id="post_main_text"
                                       placeholder="Введите текст поста">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Категория</label>
                                <input type="number" name="post_cat" class="form-control" id="post_main_text"
                                       placeholder="1-мемы, 2-пейзажи">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" display: hidden>Создатель</label>
                                <input type="text" name="creator_id" class="form-control" id="post_main_text" readonly
                                       placeholder="идентификатор создателя" display: hidden value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Видимость</label>
                                <input type="number" name="publishing_status" class="form-control" id="post_main_text"
                                       placeholder="1-пост видят все, 0-только админы">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()
