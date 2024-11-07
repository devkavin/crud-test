<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>

    <title>Teams</title>
</head>
<body>
    <h1>Teams Test</h1>
    <p>Teams here</p>
    <ul>
        @if (count($teams) === 0)
            <li>No teams</li>
            <button>
                <a href="{{ route('teams.getTeams') }}">Fetch Teams</a>
            </button>
        @endif
        @foreach ($teams as $team)
            <li>{{ $team->name }}</li>
        @endforeach
</body>
</html>
