<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto lIst</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    @include('_header')

    @if (session('status'))

    <div class="px-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <!-- Add Restro Modal start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add restaurants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRestroForm" method="post" action="/list">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary bg-info" onclick="addRestaurant()">Add
                                Restaurant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Restro Modal end -->

    <!-- Edit Restro Modal Start -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Update restaurants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRestroForm" method="post" action="/list">
                        @csrf
                        <input type="hidden" name="id" id="editRestaurantId">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="editAddress" name="address" required>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary bg-info" onclick="addRestaurant()">Update
                                Restaurant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mb-4" style="background: #dcdcdc36; padding: 1.5rem;">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="">List of Restaurant</h3>
            </div>
            <div class="col-lg-12">
                <div class="card p-2">
                    <table id="myTable" class="table table-striped table-bordered  " style="width:100%">
                        <thead>
                            <tr class="bg-info text-white">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}} </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->address}}</td>
                                <td> <button class='edit btn btn-sm btn-info text-white' data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$item->id}}" data-name="{{$item->name}}" data-email="{{$item->email}}" data-address="{{$item->address}}"><a href="#" class="editbtn">Edit</a></button>
                                    <button
                                        class='delete btn btn-sm btn-danger'><a
                                            href="/delete/{{$item->id}}">Delete</a></button> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>

            </div>
         
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.edit').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var address = $(this).data('address');
    
                $('#editRestaurantId').val(id);
                $('#editName').val(name);
                $('#editEmail').val(email);
                $('#editAddress').val(address);
            });
        });
    </script>
    

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        } );
    </script>



</body>

</html>