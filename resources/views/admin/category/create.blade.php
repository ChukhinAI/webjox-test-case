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
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4 style="margin-left: 50%"><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
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
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" required
                                       placeholder="Введите заголовок поста">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Изображение для превью</label>
                                <select name="preview_img" required>
                                    <option value="">Выберите значение</option>
                                    <option value="1">мемы</option>
                                    <option value="2">пейзажи</option>
                                    <option value="3">другое</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Изображение для поста</label>
                                <select name="img" required>
                                    <option value="">Выберите значение</option>
                                    <option value="1">мемы</option>
                                    <option value="2">пейзажи</option>
                                    <option value="3">другое</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Текст поста</label>
                                <input type="text" name="post_text" class="form-control" id="post_main_text" required
                                       placeholder="Введите текст поста">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Категория</label><br/>
                                <select name="category_id" required>
                                    <option value="">Выберите значение</option>
                                    <option value="1">мемы</option>
                                    <option value="2">пейзажи</option>
                                    <option value="3">другое</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" display: hidden>Создатель</label>
                                <input type="text" name="creator_id" class="form-control" id="post_main_text" readonly
                                       placeholder="идентификатор создателя" display: hidden value="{{ Auth::user()->id }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" >Видимость</label><br/>
                                <select name="pub_status_select" required="required">
                                    <option value="">Выберите значение</option>
                                    <option value="1">пост видят все</option>
                                    <option value="0">пост видят только администраторы и модераторы</option>
                                </select>
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
