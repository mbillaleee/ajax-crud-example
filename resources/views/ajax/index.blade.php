@extends('layouts.app')

@section('content')
<div class="container">

<textarea name="description" class="form-control itemDescirption" rows="5" data-url="{{route('ajax.store')}}"></textarea>

</div>
@endsection

@push('js')
<script type="text/javascript">
   // alert();

    $(document).ready(function() {
            $(document).on("change", '.itemDescirption', function() {
                // alert();
                var that = $(this);
                var url = that.attr('data-url');
                var data = that.val();
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    data: {
                        data: data
                    }
                })
            })
        });
</script>

@endpush
