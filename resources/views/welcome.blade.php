<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

                  @vite(['resources/css/app.css', 'resources/js/app.js'])

                     <style>
        body {
            max-width: 600px;


            text-align: center;
        }
        .scoreboard {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .teams {
            display: flex;
            justify-content: space-around;
            margin-bottom: 10px;
        }
        .score {
            font-size: 3em;
            font-weight: bold;
            margin: 20px 0;
        }
        .status {
            font-size: 1.2em;
            color: #555;
        }
        .controls {
            margin-top: 20px;
        }
        button {
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

    </style>
      <style>
   body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; /* Optional: stacks multiple scoreboards vertically */
    background-image: url('{{ asset('images/img.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    height: 100vh;
    margin: 0;
}

#matchDetails {
    width: 500px;
    max-width: 600px;
    margin-left: 500px;
    margin-top: 100px;

}



    </style>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class=" text-black/50 dark:bg-black dark:text-white/50">
            <div id="matchDetails">
   @forEach($matchData as $match)
 <div class="scoreboard">
        <div>
             <h1><b>{{$match->name}}</b></h1>
             </div>
        <div class="teams">
            <div>
                <h2>{{ $match->team_a }}</h2>
                <div id="teamA-score">{{$match->matchScores->team_a_score}}</div>
            </div>
            <div>
                 <h2>{{ $match->team_b }}</h2>
                <div id="teamB-score">{{ $match->matchScores->team_b_score}}</div>
            </div>
        </div>
        <div class="score" id="match-score">{{$match->matchScores->team_a_score}} - {{ $match->matchScores->team_b_score}}</div>
        <div class="status">

            <div id="match-time">00:00</div>
        </div>
    </div>

    @endforeach
        </div>
        </div>
    </body>

     <script type="module">

document.addEventListener("DOMContentLoaded", function () {
    window.Echo.channel('football-scores')
        .listen('.score.updated', (e) => {

              console.log("Received match data:", e);

            const container = document.getElementById("matchDetails");
            container.innerHTML = ""; // Clear previous content

            if (Array.isArray(e)) {
                console.log("Received match data:", e.id);
                e.forEach(item => {
                    const div = document.createElement("div");

                    div.innerHTML = `


                         <div class="scoreboard">
        <div class="teams">
            <div>
                <h2>Team A</h2>
                <div id="teamA-score">${item.match_scores.team_a_score}</div>
            </div>
            <div>
                <h2>Team B</h2>
                <div id="teamB-score">${item.match_scores.team_b_score}</div>
            </div>
        </div>
        <div class="score" id="match-score">${item.match_scores.team_a_score} - ${item.match_scores.team_b_score}</div>
        <div class="status">

            <div id="match-time">00:00</div>
        </div>
    </div>
                    `;

                    container.appendChild(div);
                });
            } else {
                container.innerHTML = "<p>No match data available.</p>";
            }
        });
});
    </script>


</html>
