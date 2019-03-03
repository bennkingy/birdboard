<!DOCTYPE html>
<html>

<head>

<title>Create Projects</title>

</head>

<body>

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

    </form>

</body>
</html> 