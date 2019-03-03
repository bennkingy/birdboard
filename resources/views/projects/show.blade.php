// View extends layouts/app.blade.php
@extends ('layouts.app')
@section('content')

    <h1> {{ $project->title }} </h1>

    <div> {{ $project->description }} </div>

</body>
</html> 

@endsection