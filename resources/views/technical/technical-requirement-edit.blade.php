@extends('layouts.app')
@section('title')
    Proyectos
@endsection
@section('css')
    <link href="{{ URL::asset('libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcumb')
        @slot('li_1')
            <a href="{{route('technical.project.requirement',$requirement->project_id)}}">Proyecto</a>
        @endslot
        @slot('title')
            Requerimiento
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-7">
            <form method="POST" action="{{route('technical.project.requirement.update',$requirement)}}"
                  class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Fecha Inicio</label>
                                            <input id="start_date"
                                                   type="date"
                                                   required
                                                   class="form-control @error('start_date') is-invalid @enderror"
                                                   name="start_date"
                                                   placeholder="Ingrese una fecha"
                                                   data-provider="flatpickr"
                                                   disabled
                                                   value="{{$requirement->start_date}}">
                                            @error('start_date')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">Fecha limite</label>
                                            <input id="end_date"
                                                   type="date"
                                                   required
                                                   disabled
                                                   class="form-control @error('end_date') is-invalid @enderror"
                                                   name="end_date"
                                                   value="{{$requirement->end_date}}"
                                                   placeholder="Ingrese una fecha" data-provider="flatpickr">
                                            @error('end_date')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="state" class="form-label">Etapa</label>
                                            <input id="state" class="form-control" disabled
                                                   value="{{$requirement->state}}"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Descripción</label>
                                            <input id="description"
                                                   disabled
                                                   name="description"
                                                   class="form-control"
                                                   value="{{$requirement->description}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="solution" class="form-label">Solución (*)</label>
                                            <textarea id="solution"
                                                      rows="5"
                                                      name="solution"
                                                      class="form-control"
                                            ></textarea>
                                            @error('solution')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="file" type="hidden" value="{{old('file')}}">
                                        <input name="file_name" type="hidden" value="{{old('file_name')}}">
                                        <input name="file_size" type="hidden" value="{{old('file_size')}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <a class="btn btn-danger"
                               href="{{route('technical.project.requirement',$requirement->project_id)}}">Cancelar</a>
                            <button type="submit" class="btn btn-success">Grabar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5">
            <form id="dropzone"
                  method="POST"
                  class="dropzone text-center align-items-center justify-content-center"
                  action="{{route('technical.project.requirement.upload')}}"
                  enctype="multipart/form-data">
                @csrf
            </form>
            <ul class="list-unstyled mb-0" id="dropzone-preview">
                <li class="mt-2" id="dropzone-preview-list">
                    <!-- This is used as the file preview template -->
                    <div class="border rounded">
                        <div class="d-flex p-2">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded">
                                    <img src="{{asset('images/file.png')}}" alt="Project-Image" data-dz-thumbnail
                                         class="img-fluid rounded d-block"/>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="pt-1">
                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-3">
                                <button data-dz-remove class="btn btn-sm btn-danger">Borrar</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('libs/dropzone/dropzone-min.js') }}"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
        if (dropzonePreviewNode) {
            dropzonePreviewNode.id = "";
            var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
            dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
            var dropzone = new Dropzone("#dropzone", {
                previewTemplate: previewTemplate,
                previewsContainer: "#dropzone-preview",
                dictDefaultMessage: 'Carga archivos aquí',
                acceptedFiles: '.png, .jpg, .jpeg, .gif, .pdf',
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                uploadMultiple: false,
                init: function () {
                    if (document.querySelector('[name="file"]').value.trim()) {
                        const file = {};
                        file.size = 3;
                        file.name = document.querySelector('[name="file_name"]').value;
                        file.size = document.querySelector('[name="file_size"]').value;
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, `/storage/uploads/${file.name}`)
                        file.previewElement.classList.add('dz-success', 'dz-complete');
                    }
                }
            });
            dropzone.on('addedfile', function (file) {
                var ext = file.name.split('.').pop();
                if (ext == "pdf") {
                    $(file.previewElement).find(".dz-image img").attr("src", "/Content/Images/pdf.png");
                } else if (ext.indexOf("doc") != -1) {
                    $(file.previewElement).find(".dz-image img").attr("src", "/Content/Images/word.png");
                } else if (ext.indexOf("xls") != -1) {
                    $(file.previewElement).find(".dz-image img").attr("src", "/Content/Images/excel.png");
                }
            });

            dropzone.on('success', function (file, response) {
                document.querySelector('[name="file"]').value = response.file;
                document.querySelector('[name="file_name"]').value = response.file_name;
            });

        }

    </script>
@endsection
