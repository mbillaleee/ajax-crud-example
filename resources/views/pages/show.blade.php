@extends('layouts.app')

@section('content')
    <div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
    </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody id="memberBody">
                
            </tbody>
        </table>
    </div>
@endsection


@push('js')
    <script>
        
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            showMember();

            $('#addForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url  = $(this).attr('action');
                $.ajax({
                    type: 'post',
                    url : url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#exampleModal').modal('hide');
                        $('#addForm')[0].reset();
                        showMember();
                    }
                });
            });

            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var description = $(this).data('description');

                $('#editmodal').modal('show');
                $('#name1').val(name);
                $('#email1').val(email);
                $('#description1').val(description);
                $('#memid').val(id);
            });
            $('#editForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url  = $(this).attr('action');
                $.post(url, form, function(data){
                    $('#editmodal').modal('hide');
                    showMember();
                })
            });

            $(document).on('click', '.delete', function(event){
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deletemember').val(id);
            });

            $('#deletemember').click(function(){
                var id = $(this).val();
                $.post("{{ URL::to('delete') }}", {id:id}, function(){
                    $('#deletemodal').modal('hide');
                    showMember();
                })
            })
        });

        function showMember(){
            // alert('show all records');
            $.get("{{ URL::to('show') }}", function(data){
                // console.log(data);
                $('#memberBody').empty().html(data)
            }); 
        }
    </script>
@endpush