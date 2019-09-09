@if (Session::has('sukses'))
  <div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    <strong>Sukses:</strong> {{Session::get('sukses')}}
  </div>
@endif

@if (Session::has('suksesedit'))
  <div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    <strong>Sukses:</strong> {{Session::get('suksesedit')}}
  </div>
@endif

@if (Session::has('sukseshapus'))
  <div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    <strong>Sukses:</strong> {{Session::get('sukseshapus')}}
  </div>
@endif