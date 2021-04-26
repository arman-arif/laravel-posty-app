@if (count($errors->all()))
    <div class="col-md-12">
        <ul class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach

        </ul>
    </div>
@endif
