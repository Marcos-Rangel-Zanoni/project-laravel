<!DOCTYPE html>
<html>

<head>
  <title>Missions</title>
</head>

<body>
  <h1>Missions</h1>

  <h2>Available Missions:</h2>
  <ul>
    @foreach($missions as $mission)
    @if(!$userMissions->contains($mission))
    <li>
      {{ $mission->title }} - {{ $mission->description }}
      <form method="POST" action="{{ route('missions.complete', $mission) }}">
        @csrf
        <button type="submit">Complete Mission</button>
      </form>
    </li>
    @endif
    @endforeach
  </ul>

  <h2>Completed Missions:</h2>
  <ul>
    @foreach($userMissions as $userMission)
    <li>
      {{ $userMission->title }} - {{ $userMission->description }}
      Completed at: {{ $userMission->pivot->completed_at }}
    </li>
    @endforeach
  </ul>
</body>

</html>