<div class="alert-dismiss" >
    @if ($message = Session::get('success'))
    <div class="col-10 mb-3" style="margin-left: 100px">
        <div class="alert alert-success alert-dismissible fade show">
            <p><strong>{{ $message }}</strong></p>
            <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        </div>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="col-10 mb-3" style="margin-left: 100px">
        <div class="alert alert-danger alert-dismissible fade show">
            <p><strong>{{ $message }}</strong></p>
            <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        </div>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="col-10 mb-3">
        <div class="alert alert-warning alert-dismissible fade show">
            <p><strong>{{ $message }}</strong></p>
            <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        </div>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="col-10 mb-3" style="margin-left: 100px">
        <div class="alert alert-info alert-dismissible fade show">
            <p><strong>{{ $message }}</strong></p>
            <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="col-10 mb-3" style="margin-left: 70px">
        <div class="alert alert-danger alert-dismissible fade show">
            Veuillez remplir les champs vides :(
            <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span></button>
        </div>
    </div>
    @endif
</div>