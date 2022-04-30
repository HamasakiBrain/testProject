@extends('layouts.app')
@section('content')
    <div class="container">
        <form>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" accept="text/csv">
                        <label class="custom-file-label" for="customFile">Выберите файл с данными</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить данные</button>
        </form>
    </div>
@endsection
