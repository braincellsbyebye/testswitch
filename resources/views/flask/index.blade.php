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
                        <a href="{{ url('add-item') }}" style="margin-left: 400px" class="btn btn-info float-end">Add Item</a>
                        <a href="{{ url('/flasks') }}"class="btn btn-info float-end">Home</a>
                    </h4>
                </div>
                <div> 
                    <br>
                    <form action="{{ url("/search") }}" method="GET">
                        <input type="text" class="form-control" name="query" placeholder="Search">
                        <button style="margin-left: 1005px; margin-top:15px;" class="btn btn-info" type="submit">Search</button>
                    </form>
                    <div style="width: 50%" class="card-body">
                        <ul style="list-style: none">
                        @foreach ($af as $item)
                            <li style="display: inline">
                                <div style="text-align: center; align-items: center; display: flex;" class="card">
                                    <img src="{{ asset('uploads/aquaflasks/'.$item->image) }}" width="200px" height="200px" alt="Image">
                                    <p style="width: 200px">Name: {{ $item->name }} Ounces: {{ $item->oz }}</p>
                                    <p style="margin-top: -18px">Price: {{ $item->price }}PHP</p>
                                    <a href="{{ url('edit/'.$item->id) }}" style="width: 75px; margin-right: 125px" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ url('delete/'.$item->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="width: 75px; margin-left: 125px; margin-top: -31px" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                                <br>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
