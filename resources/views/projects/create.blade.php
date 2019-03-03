// View extends layouts/app.blade.php
@extends ('layouts.app')
@section('content')

    <form method="POST" action="/projects">

        @csrf

        <h1>Create a project</h1>

        <label for="title">
            <input type="text" name="title" id="title">
        </label>


        <label for="description">
            <textarea name="description" id="title" cols="30" rows="10"></textarea>
        </label>

        <button type="submit">Create</button>

        <!-- Back to projects -->
        <a href="/projects">Cancel</a>

    </form>

</body>
</html> 

@endsection