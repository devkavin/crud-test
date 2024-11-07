<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script rel="javascript" type="text/javascript" href="js/jquery-1.11.3.min.js"></script>

    <title>Updated Teams</title>
</head>
<body>
    <h1>Updated Teams Test</h1>
    <ul>
        @if (count($teams) === 0)
            <li>No teams</li>
            <button>
                <a href="{{ route('teams.getTeams') }}">Fetch Teams</a>
            </button>
        @endif
            <p>Updated Teams here</p>
        @foreach ($teams as $team)
            <li>Name: {{ $team->name }}</li>
            <li>Status: {{ $team->status }}</li>
        @endforeach
</body>
</html>
