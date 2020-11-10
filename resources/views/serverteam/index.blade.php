@extends('layouts.master')
@section("title", 'Service Team')
@section('content')
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-admin">
            <div class="card">
                <div class="card-header"><b>Service Team</b></div>
                <div class="card-body" id="card-body-all">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
                    <script type="text/javascript">
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: 'http://54.226.240.114/public/api/v2/products',
                            success: function(data) {
                                $.each(data.data, function(i, f) {
                                    var tblRow = "<tr>" + "<td>" + f.id + "</td>" +
                                        "<td>" + f.name + "</td>" + "<td>" + f.price + "</td>" +
                                        "<td>" + f.rating + "</td>" + "<td>" + f.category + "</td>" + 
                                        "<td>" + f.ingredients + "</td>" + "<td>" + f.description + "</td>"
                                        + "</tr>"
                                    $(tblRow).appendTo("#userdata tbody");
                                });
                                console.log(data);
                            }
                        });
                    </script>

                    <table id="userdata" border="2">
                        <thead>
                            <th>id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Category</th>
                            <th>Ingredients</th>
                            <th>Description</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection