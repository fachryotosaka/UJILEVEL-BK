@extends('layouts.app', ['title' => 'Profile'])

@section('content')

<div class="col-md-4">
    <div class="card border-0 shadow rounded">
        <div class="card-body">                    
            <form class="w-px-500 p-3 p-md-3" action="{{ route('user-profile-information.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" @error('name') is-invalid @enderror>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" @error('email') is-invalid @enderror>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="photo" @error('photo') is-invalid @enderror id="selectImage">
                    </div>
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <img id="preview" src="{{ $user->profile_photo_url }}" alt="your photo" class="mt-3" style="height: 100px"/>
                </div>

                @if ($user->profile_photo_url)
                <div>
                    <a href="{{ route('profile.photo-delete',$user->id) }}">Delete photo</a>
                </div>
                @endif

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush