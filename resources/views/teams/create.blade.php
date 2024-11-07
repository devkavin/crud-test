<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>

    <title>Teams</title>
</head>
<body>
    <h1>Create Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-row">
            <label for="conference">Conference:</label>
            <input type="text" name="conference" id="conference">
        </div>

        <div class="form-row">
            <label for="division">Division:</label>
            <input type="text" name="division" id="division">
        </div>

        <div class="form-row">
            <label for="city">City:</label>
            <input type="text" name="city" id="city">
        </div>

        <div class="form-row">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-row">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name">
        </div>

        <div class="form-row">
            <label for="abbreviation">Abbreviation:</label>
            <input type="text" name="abbreviation" id="abbreviation">
        </div>

        <button type="submit">Create Team</button>
    </form>

</body>
</html>
