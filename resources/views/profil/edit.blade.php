@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Profil</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/profil"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/profil">Profil</a>
                    <li class="breadcrumb-item"><a href="/profil/create">Edit Profil</a>
                    </li>
        </ul>
    </div>
</div>



<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <!-- Basic Form Inputs card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Edit Profil</h5>
                </div>
                <form method="post" action="/profil/{{ $data->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="body">Body</label>
                            <div class="col-sm-9">
                                <textarea id="my-editor" name="body" class="form-control">{!! old('body', $data['body']) !!}</textarea>
                            </div>
                        </div>

                        <div class="m-2">
                            <a href="{{ url('/profil') }}" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>



<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>


<script>

             function previewImage() {
             const image = document.querySelector('#image');
             const imagePreview = document.querySelector('.image-preview');
          // Display the image preview container
             imagePreview.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
           imagePreview.src = oFREvent.target.result;
           };
           }
    </script>
@endsection
