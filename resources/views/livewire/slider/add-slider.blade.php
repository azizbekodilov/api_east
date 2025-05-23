@section('title', 'Добавить слайдер - EastMetProkat')
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить слайдер</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item"><a href="/east/sliders">Слайдер</a></li>
                        <li class="breadcrumb-item active">Добавить слайдер</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-sm-12 col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Основная информация</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label for="">Названия</label>
                                    <input type="text" wire:model="title" class="form-control" placeholder="Названия">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Текст</label>
                                    <input type="text" wire:model="info" class="form-control"
                                        placeholder="Мета заголовок">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Фото</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="">
                                            <label class="custom-file-label" for="">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" wire:click="save" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:200
            });
        });
    </script>
    @endsection
