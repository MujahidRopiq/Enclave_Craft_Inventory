@extends('layouts.table') @section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/img/avatars/{{$data->image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" style="margin-bottom:1px">{{$data->name}}</h3>

                <p class="text-muted text-center mb-3">
                {{$data->email}}
                </p>
                <div class="col-sm-6">
                @if ($data->role == 1)
                    <button type="button" class="offset-sm-7 btn btn-outline-primary btn-sm btn-block disabled" ><strong>
                Admin
                @else
                <button  type="button" class="offset-sm-7 btn btn-outline-danger btn-sm btn-block disabled" >
                    <strong>
                    Pegawai
                    </strong>
                </button>
                @endif
                    </strong></button>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
              @if(Session::has('success')) 
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::has('error')) 
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                  <div class="tab-pane" id="settings">
                    <form action="{{route('myaccount.update', $data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('put')
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                        </div>
                      </div>

                      <!-- <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-2">
                            <div class="form-group pt-2">
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                <label for="customRadio1" class="custom-control-label">Admin</label>
                                </div>

                                <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio2" name="customRadio" checked>
                                <label for="customRadio2" class="custom-control-label">Pegawai</label>
                                </div>
                            </div>
                        </div>
                      </div> -->

                      <div class="form-group row">
                        <label for="image" class=" col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10 ">
                        <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg">
                        <input type="hidden" name="image_old" value="{{ $data->image }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                    <label class=" col-sm-2 col-form-label"></label>
                            <div id="imagePreviews" class="d-flex justify-content-start flex-wrap">
                            </div>
                        </div>
                  </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreviews = document.getElementById('imagePreviews');

        imageInput.addEventListener('change', function() {
            imagePreviews.innerHTML = '';

            for (const file of this.files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = '128px';
                    img.classList.add('rounded', 'shadow-sm', 'border', 'm-1')
                    imagePreviews.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection