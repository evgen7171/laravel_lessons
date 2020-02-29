@if(session('message') or session('errroMessage'))
    <div class="container">
        <div class="alert <?=session('messageError') ? 'alert-danger' : 'alert-success'?>  alert-dismissible fade show"
             role="alert">
            <strong>{{$message['title']}}</strong> {{$message['content']}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif