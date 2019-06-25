@extends('layouts.app')

@section('content')
<script type="text/javascript">
$(document).ready(function () {
    $("#search").keyup(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("/posts/search", { search: $('#search').val(), _token: CSRF_TOKEN }, function(data) {
            $('.event').html('');
            $.each(data, function(i, event) {
                
                
                var c = '<div class="list-item-with-icon row">\n\
                             <div class="col-md-8">\n\
                               <h4><a href="/posts'+event.id+'">'+event.title+'</h4>\n\
                             <div>'+event.body+'</div>\n\
                           </div>';
                 $('.event').append(c);
            });
        });
    })
});
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h4 class="card-title">{{__('translations.Search')}}</h4></div>
                <div class="card-body">
                    <input type="text" id="search">
                    <div class="card-text event"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 