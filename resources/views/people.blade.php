<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Rokkitt:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Welcome to Active Company</title>
</head>

<body>


    <div class="logo-box header">
        <a href="/projects"><img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-header"></a>
        <h1 class="section-name">Projects</h1>
        <a href="/completedProjects" class="completed-projects">Completed Projects</a>
        <form method="POST" action="{{ route('search') }}" class="search">
            @csrf
            <a href="/createProject" style="display: @if(auth()->user()->job_type!='Manager') none @endif" class="create-link">Create New Project</a>
            <input type="text" placeholder="Search" name="search" class="search-text">
            <button class="position-absolute" style="height: 40px; background: none;border:none;margin-right: 15px; cursor: pointer;" type="submit"><img src="{{asset('img/search.svg')}}" alt="search icon"></button>
        </form>
        <a href="/myProfile"><img src="{{asset('img/avatar.svg')}}" alt="Profile" class="profile find-help" title="Profile"></a>
        <p class="text-light d-inline" style="font-size: 16px; font-weight:bold;">{{ auth()->user()->name }} <br><span style="font-size: 12px; font-weight:normal;"> {{ auth()->user()->job_type }}</span></p>
    </div>


    <div class="container">

        <div class="row ">
            <div class="col-3 nav-bar">

                <nav class="nav-bar-items">
                    <ul>

                        <li class="items" style="cursor: pointer;">
                            <a href="/" class="nav-bar-link"><img src="img/project.png" alt="Project" class="nav-bar-icon"><span class="nav-bar-text">
                                    Projects
                                </span></a>
                        </li>

                        <li class="items" style="cursor: pointer;" onclick="window.location.href = '/myWork' ">
                            <a href="/myWork" class="nav-bar-link"><img src="img/myWork.png" alt="My Work" class="nav-bar-icon"><span class="nav-bar-text">
                                    My Work
                                </span></a>
                        </li>

                        <li class="items" style="cursor: pointer;" onclick="window.location.href = '/people' ">
                            <a href="/people" class="nav-bar-link"><img src="img/ekip.png" alt="People" class="nav-bar-icon"><span class="nav-bar-text">
                                    People
                                </span></a>
                        </li>

                        <a class="nav-bar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <li class="items">
                                <img src="img/logout.png" alt="Log Out" class="nav-bar-icon"><span class="nav-bar-text">
                                    Log out
                                </span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </a>
                    </ul>
                </nav>

            </div>
            <div class="col-9 p-4 ">
                <div class="card-content-detailed">
                    <div class="project-members">
                        <h2 class="assignee">
                            Managers
                        </h2>

                        @foreach(array_chunk($managers, 3) as $chunk)
                        @foreach($chunk as $person)
                        <div class="project-members-info">
                            <img src="img/avatar.svg" alt="Project Member" class="project-members-info-img">
                            <p>{{$person->name}} <br>{{$person->email}}</p>
                        </div>
                        @endforeach

                        @endforeach
                    </div>


                    <div class="project-members">
                        <h2 class="assignee">
                            Developers
                        </h2>
                        @foreach(array_chunk($developers, 3) as $chunk)
                        @foreach($chunk as $person)
                        <div class="project-members-info">
                            <img src="img/avatar.svg" alt="Project Member" class="project-members-info-img">
                            <p>{{$person->name}} <br>{{$person->email}}</p>
                        </div>
                        @endforeach

                        @endforeach
                    </div>

                    <div class="project-members">
                        <h2 class="assignee">
                            Analysts
                        </h2>
                        @foreach(array_chunk($analyst, 3) as $chunk)
                        @foreach($chunk as $person)
                        <div class="project-members-info">
                            <img src="img/avatar.svg" alt="Project Member" class="project-members-info-img">
                            <p>{{$person->name}} <br>{{$person->email}}</p>
                        </div>
                        @endforeach

                        @endforeach
                    </div>

                </div>


            </div>


            <script src="js/star.js"></script>



</body>

</html>