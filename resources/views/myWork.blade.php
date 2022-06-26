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

    <link rel="stylesheet" href="css/main.css">
    <title>Welcome to Active Company</title>
</head>

<body>


    <div class="logo-box header">
        <a href="/"><img src="img/logo.png" alt="Logo" class="logo-header"></a>
        <h1 class="section-name">My Work</h1>
        <form method="POST" action="{{ route('search') }}" class="search">
            <input type="text" placeholder="Search" name="search" class="search-text">
            <button type="submit" >Search</button>
        </div>
        <a href="#"><img src="img/help.png" alt="Find Help" class="find-help" title="Find Help"></a>
        <a href="/myProfile"><img src="img/profile.png" alt="Profile" class="profile find-help" title="Profile"></a>
        <a href="#"><img src="img/notification.png" alt="Notifications" class="notification find-help" title="Notifications"></a>
    </div>


    <div class="container">

        <div class="row ">
            <div class="col-3 nav-bar">

                <nav class="nav-bar-items">
                    <ul>
                        <li class="items">
                            <a href="/" class="nav-bar-link"><img src="img/project.png" alt="Project" class="nav-bar-icon"><span class="nav-bar-text">
                                    Projects
                                </span></a>
                        </li>

                        <li class="items">
                            <a href="/myWork" class="nav-bar-link"><img src="img/myWork.png" alt="My Work" class="nav-bar-icon"><span class="nav-bar-text">
                                    My Work
                                </span></a>
                        </li>

                        <li class="items">
                            <a href="/people" class="nav-bar-link"><img src="img/ekip.png" alt="People" class="nav-bar-icon"><span class="nav-bar-text">
                                    People
                                </span></a>
                        </li>

                        <li class="items">
                            <a class="nav-bar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <img src="img/logout.png" alt="Log Out" class="nav-bar-icon"><span class="nav-bar-text">
                                    Log out
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>

            </div>



            <div class="col-9 p-4 project-cards-detailed">
                <div class="card-content-detailed">
                    @if(auth()->user()->job_type != 'Manager')
                    <div class="tasks-list">
                        <ul class="tasks-list-list">
                            @php
                            $p = 0;
                            $t = 0;
                            @endphp

                            @if($p == 0)
                            <p style="font-size: 25px; font-weight: bolder; border-bottom: solid 2px black;">Tasks
                            </p>
                            @php
                            $p = 1
                            @endphp
                            @endif
                            @foreach($tasks as $task)
                            @if($task->status == "In Progress")
                            <li class="task-item">
                                <a href="/taskDetailed/{{$task->id}}" class="tasks">{{$task->title}}</a>

                                <span style="color: orange;">{{$task->status}}</span>
                                <form method="POST" action="{{ route('update_task') }}" >
                                    @csrf
                                    <input style="display:none;" type="text" name="type" value="done_task">
                                    <input style="display:none;" type="text" name="task_id" value="{{$task->id}}">
                                    <input type="time" name="time_sheet" required>
                                    <button name="done_btn" class="btn btn-outline-success">Done</button>
                                </form>
                                


                            </li>
                            @endif
                            @endforeach

                            @if($t == 0)
                            <p style="font-size: 25px; font-weight: bolder; border-bottom: solid 2px black;">Completed Tasks
                            </p>
                            @php
                            $t = 1
                            @endphp
                            @endif
                            @foreach($tasks as $task)
                            @if($task->status == "Done")
                            <li class="task-item">
                                <a href="/taskDetailed/{{$task->id}}" class="tasks">{{$task->title}}</a>

                                <span style="color: green;">{{$task->status}}</span>
                                <form method="POST" action="{{ route('update_task') }}" >
                                    @csrf
                                    <input style="display:none;" type="text" name="type" value="in_progress_task">
                                    <input style="display:none;" type="text" name="task_id" value="{{$task->id}}">
                                    <button name="done_btn" class="btn btn-outline-warning">In Progress</button>
                                </form>
                                


                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="tasks-list">
                        <ul class="tasks-list-list">
                            @php
                            $p = 0;
                            $t = 0;
                            @endphp
                            @if($p == 0)
                            <p style="font-size: 25px; font-weight: bolder; border-bottom: solid 2px black;">Your Projects
                            </p>
                            @php
                            $p = 1
                            @endphp
                            @endif
                            @foreach($projects as $project)
                            @if($project->status == "In Progress")
                            <li class="task-item">
                                <a href="/seeDetails/{{$project->id}}" class="tasks">{{$project->title}}</a>

                                <span style="color: orange;">{{$project->status}}</span>
                                <form method="POST" action="{{ route('update_task') }}" >
                                    @csrf
                                    <input style="display:none;" type="text" name="project_id" value="{{$project->id}}">
                                    <input style="display:none;" type="text" name="type" value="done_project">
                                    <button name="done_btn" class="btn btn-outline-success">Done</button>
                                </form>
                            </li>
                            @endif
                            @endforeach
                            

                            @if($t == 0)
                            <p style="font-size: 25px; font-weight: bolder; border-bottom: solid 2px black;">Your Completed Projects 
                            </p>
                            @php
                            $t = 1
                            @endphp
                            @endif
                            @foreach($projects as $project)
                            @if($project->status == "Completed")
                            <li class="task-item">
                                <a href="/seeDetails/{{$project->id}}" class="tasks">{{$project->title}}</a>

                                <span style="color: green;">{{$project->status}}</span>
                                <form method="POST" action="{{ route('update_task') }}" >
                                    @csrf
                                    <input style="display:none;" type="text" name="project_id" value="{{$project->id}}">
                                    <input style="display:none;" type="text" name="type" value="in_progress_project">
                                    <button name="done_btn" class="btn btn-outline-warning">In Progress</button>
                                </form>
                            </li>
                            @endif
                            @endforeach


                        </ul>
                    </div>
                    @endif


                </div>


            </div>


        </div>
    </div>

    <script src="js/star.js"></script>

</body>

</html>