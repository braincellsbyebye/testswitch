<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div style="background-color: #0047AB; color: white" class="card-header">
                    <h4>AquaFlask Inventory Management System
                        <a href="{{ url('flasks') }}" style="margin-left: 540px" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update/'.$af->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $af->name }}" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Oz</label>
                                <input type="text" name="oz" value="{{ $af->oz }}" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Price</label>
                                <input type="text" name="price" value="{{ $af->price }}" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Upload Image</label><br>
                                <input type="file" name="image" >
                                <img src="{{ asset('uploads/aquaflasks/'.$af->image) }}" width="70px" height="70px" alt="Image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
