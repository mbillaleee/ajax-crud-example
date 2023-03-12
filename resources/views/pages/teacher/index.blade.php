@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h2>Teacher List</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name </th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">SL No</td>
                            <td scope="col">Name </td>
                            <td scope="col">Title</td>
                            <td scope="col">Description</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="card">
            <div class="card-header">
                <span class="addTea">Add Teacher</span> <span class="updTea">Update Teacher</span>
            </div>
            <div class="card-body">
                <form id="" name="" class="form-horizontal" action="">
                    <input type="hidden" name="id" id="memid">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Institute</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="institute" name="institute" placeholder="Enter institute" value="" required>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10 mt-2">
                        <button type="button" onClick="addData()" class="btn btn-primary addBtb" id="savedata" value="create">Add </button>
                        <button type="button" class="btn btn-primary updBtn" id="savedata" value="create">Update </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('.addTea').show();
    $('.addBtb').show();
    $('.updTea').hide();
    $('.updBtn').hide();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function allData(){

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "/teacher/all",
            success:function(response){
                // console.log(data);
                var data = ""
                $.each(response, function(key, value){
                    // console.log(value.name);
                    data = data + "<tr>" 
                    data = data + "<td>" + value.id + "</td>"
                    data = data + "<td>" + value.name + "</td>"
                    data = data + "<td>" + value.title + "</td>"
                    data = data + "<td>" + value.institute + "</td>"
                    data = data + "<td>"
                    data = data + "<button class='btn btn-sm btn-primary'>Edit</button>"
                    data = data + "<button class='btn btn-sm btn-danger'>Delete</button>"
                    data = data + "</td>"
                    data = data + "</tr>" 
                })
                $('tbody').html(data)
            }
        })
    }
    allData();

    function clearData(){
        $('#name').val('');
        $('#title').val('');
        $('#institute').val('');
    }
    
    function addData(){
       var name = $('#name').val();
       var title = $('#title').val();
       var institute = $('#institute').val();
    //    console.log(name);
    //    console.log(title);
    //    console.log(institute);
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: { name:name, title:title, institute:institute},
        url: "/teacher/store/",
        success:function(response){
            clearData();
            allData();
                console.log("data ok");
        }


    });
    }
</script>
@endpush