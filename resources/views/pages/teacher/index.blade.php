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
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="">
                        <span class="text-danger" id="titleError"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Institute</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="institute" name="institute" placeholder="Enter institute" value="">
                            <span class="text-danger" id="instituteError"></span>
                        </div>
                    </div>
                        {{-- <input type="text" id="id"> --}}
                    <div class="col-sm-offset-2 col-sm-10 mt-2">
                        <button type="button" onClick="addData()" class="btn btn-primary addBtb" id="savedata" value="create">Add </button>
                        <button type="button" onClick="updateData()" class="btn btn-primary updBtn" id="savedata" value="create">Update </button>
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
// -------- stsart get all data from database---------
    function allData(){
        // console.log(data);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "/teacher/all",
            success:function(response){
                console.log(data);
                var data = ""
                $.each(response, function(key, value){
                    // console.log(value.name);
                    data = data + "<tr>" 
                    data = data + "<td>" + value.id + "</td>"
                    data = data + "<td>" + value.name + "</td>"
                    data = data + "<td>" + value.title + "</td>"
                    data = data + "<td>" + value.institute + "</td>"
                    data = data + "<td>"
                    data = data + "<button class='btn btn-sm btn-primary' onclick='editData("+value.id+")'>Edit</button>"
                    data = data + "<button class='btn btn-sm btn-danger' onclick='deleteData("+value.id+")'>Delete</button>"
                    data = data + "</td>"
                    data = data + "</tr>" 
                })
                $('tbody').html(data)
            }
        })
    }
    allData();
    // -------- end get all data from database---------

    // -------- start clear data---------
    function clearData(){
        $('#name').val('');
        $('#title').val('');
        $('#institute').val('');


        // error span clear start
        $('#nameError').text('');
        $('#titleError').text('');
        $('#instituteError').text('');
        // error span clear end
    }
    // -------- end clear data ---------
    
// -------- start store data from database---------
    function addData(){
       var name = $('#name').val();
       var title = $('#title').val();
       var institute = $('#institute').val();
       console.log(name);
       console.log(title);
       console.log(institute);
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: { name:name, title:title, institute:institute},
        url: "/teacher/store/",
        success:function(response){
            clearData();
            allData();
            const Msg =Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                Msg.fire({
                    type: 'success',
                    title: 'Data Added Success',
                })
                console.log("data ok");
        },
        error: function(error){
            // console.log(error.responseJSON.errors.name);
            $('#nameError').text(error.responseJSON.errors.name);
            $('#titleError').text(error.responseJSON.errors.title);
            $('#instituteError').text(error.responseJSON.errors.institute);
        }
    });
// -------- end store data from database---------
    }
// --------------start editDate -------------------
    function editData(id){
        // alert(id);
        $.ajax({
            type:"GET",
            dataType: "json",
            url: "/teacher/edit/"+id,
            success: function(data){
                // console.log(data);
                $('.addTea').hide();
                $('.addBtb').hide();
                $('.updTea').show();
                $('.updBtn').show();

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#title').val(data.title);
                $('#institute').val(data.institute);
            }
        })
    }
// --------------end editDate -------------------
// --------------start  update -------------------
function updateData(){
    var id = $('#id').val();
    var name = $('#name').val();
    var title = $('#title').val();
    var institute = $('#institute').val();

    $.ajax({
        type:"POST",
        dataType: "json",
        data: { name:name, title:title, institute:institute},
        url: "/teacher/update/"+id,
        success: function(data){
            $('.addTea').show();
            $('.addBtb').show();
            $('.updTea').hide();
            $('.updBtn').hide();
            clearData();
            allData();
            // console.log('data update');
            const Msg =Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                Msg.fire({
                    type: 'success',
                    title: 'Data Update Success',
                })
                console.log("data ok");
        },
        error: function(error){
            // console.log(error.responseJSON.errors.name);
            $('#nameError').text(error.responseJSON.errors.name);
            $('#titleError').text(error.responseJSON.errors.title);
            $('#instituteError').text(error.responseJSON.errors.institute);
        }
    })
}

function deleteData(id){
    // alert(id);
    Swal.fire({
        title: 'Are you sure to Delete',
        text: "Once delete, you will not able to recover this imaginary file!",
        icon: 'warning',
        buttons: true,
        dangerModal: true,
        }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"GET",
                dataType: "json",
                url: "/teacher/destroy/"+id,
                    success: function(data){
                        $('.addTea').show();
                        $('.addBtb').show();
                        $('.updTea').hide();
                        $('.updBtn').hide();
                        clearData();
                        allData();
                        // console.log('Delete');
                        const Msg =Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        Msg.fire({
                            type: 'success',
                            title: 'Data delete Success',
                        })
                    }
                });
            }else{
                Swal.fire('Canceled');
            }
        })

    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "You won't be able to revert this!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    //     }).then((willDelete) => {
    //     if (willDelete) {
           
    //     }
    // })
    
}
// --------------end  update -------------------
</script>
@endpush