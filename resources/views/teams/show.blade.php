<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>

    <title>Teams</title>
</head>

<body>
    <h1>Team Details</h1>

    <div class="form-row">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $team->name }}" readonly>
    </div>

    <div class="form-row">
        <label for="conference">Conference:</label>
        <input type="text" name="conference" id="conference" value="{{ $team->conference }}" readonly>
    </div>

    <div class="form-row">
        <label for="division">Division:</label>
        <input type="text" name="division" id="division" value="{{ $team->division }}" readonly>
    </div>

    <div class="form-row">
        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="{{ $team->city }}" readonly>
    </div>

    <div class="form-row">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" id="full_name" value="{{ $team->full_name }}" readonly>
    </div>

    <div class="form-row">
        <label for="abbreviation">Abbreviation:</label>
        <input type="text" name="abbreviation" id="abbreviation" value="{{ $team->abbreviation }}" readonly>
    </div>

    <button>
        <a href="{{ route('teams.edit', ['team' => $team->id]) }}">Edit</a>
    </button>

    <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>

</body>

</html>
