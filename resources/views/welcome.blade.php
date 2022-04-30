@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h2>Загрузка файла с данными</h2>
              <form enctype="multipart/form-data" action="{{ route('upload') }}" method="POST">
                  @csrf
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="file">
                              <label class="custom-file-label" for="customFile">Выберите файл с данными</label>
                          </div>
                          @error('file')
                          <div class="alert alert-danger mt-2" role="alert">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Сохранить данные</button>
              </form>
          </div>
          <div class="col-md-6">
              <h2>Загрузка файла с данными (API)</h2>
              <p class="text-secondary">Принимает параметр <span class="badge badge-info">fileAPI</span></p>
              <form enctype="multipart/form-data" action="{{ route('upload.api') }}" method="POST">
                  <div class="form-row">
                      <div class="col-md-12 mb-3">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="fileAPI">
                              <label class="custom-file-label" for="customFile">Выберите файл с данными</label>
                          </div>
                          @error('fileAPI')
                          <div class="alert alert-danger mt-2" role="alert">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Сохранить данные</button>
              </form>
          </div>
      </div>
    </div>
@endsection
