@extends('layouts.app')

@section('content')
<div class="container">

</div>
@endsection
@section('js-scripts')
<script type="text/javascript">
    toastr.options = {"positionClass":"toast-top-right","closeButton":"true","progressBar":"true"};toastr.success('toastr message in here','toastr title');
</script>
@endsection
