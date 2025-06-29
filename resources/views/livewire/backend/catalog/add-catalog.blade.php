@section('title', 'Добавить каталог - EastMetProkat')
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить каталог</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item"><a href="/east/catalogs">Каталог</a></li>
                        <li class="breadcrumb-item active">Добавить</li>
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
                                    <label for="">URL</label>
                                    <input type="text" wire:model="slug" class="form-control" placeholder="URL">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Короткий текст</label>
                                    <input type="text" wire:model="short_text" class="form-control"
                                        placeholder="Короткий текст">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Текст</label>
                                    <textarea wire:model="text" id="summernote" class="form-control" placeholder="Короткий текст"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Мета заголовок</label>
                                    <input type="text" wire:model="meta_title" class="form-control"
                                        placeholder="Мета заголовок">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Мета описания</label>
                                    <input type="text" wire:model="meta_description" class="form-control"
                                        placeholder="Мета описания">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Подкаталог</label>
                                    <select wire:model="parent_id" class="form-control">
                                        <option value="">Выберите подкаталог</option>
                                        @foreach ($catalogs as $catalog)
                                            <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Фото</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" wire:model.lazy="media">
                                            <div class="img-thumnail">
                                                @if ($media != '')
                                                    <img src="{{ asset('storage/catalogs/'.$media) }}" alt="">
                                                @endif
                                            </div>
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
