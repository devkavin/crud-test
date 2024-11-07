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
    <button>
        <a href="{{ route('teams.create') }}">Create Team</a>
    </button>
    <ul>
        @if (count($teams) === 0)
            <li>No teams</li>
            <button>
                <a href="{{ route('teams.getTeams') }}">Fetch Teams</a>
            </button>
            @else
            <div class="row">
                <p>Push Teams:</p>
                <button>
                    <a
                    href="{{ route('teams.pushUpdatedTeams') }}"
                    >
                    Push Teams
                </a>
                </button>
            </div>
        @endif
        <p>Teams here</p>
        @foreach ($teams as $team)
            <li>Name: <a href="{{ route('teams.show', ['team' => $team->id]) }}">{{ $team->name }}</a></li>
        @endforeach
</body>
</html>
