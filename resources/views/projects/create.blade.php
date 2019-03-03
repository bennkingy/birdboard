// View extends layouts/app.blade.php
@extends ('layout.app')
@section('content')

    <form method="POST" action="/projects">

        @csrf

        <h1> Create a project </h1>

        <label for="">
            <input type="text" name="" id="">
        </label>


        <label for="">
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </label>

        <button type="submit"></button>

        <!-- Back to projects -->
        <a href="/projects">Cancel</a>

    </form>

</body>
</html> 

@endsection