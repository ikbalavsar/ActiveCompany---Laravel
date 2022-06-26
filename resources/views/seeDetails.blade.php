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
            <input type="text" placeholder="Search" name="search" class="search-text">
            <button type="submit">Search</button>
        </form>
        <a href="/myProfile"><img src="img/avatar.svg" alt="Profile" class="profile find-help" title="Profile"></a>
        <p class="text-light d-inline" style="font-size: 16px; font-weight:bold;">{{ auth()->user()->name }} <br><span style="font-size: 12px; font-weight:normal;"> {{ auth()->user()->job_type }}</span></p>
    </div>
    </div>


    <div class="container">

        <div class="row ">
            <div class="col-3 nav-bar">

                <nav class="nav-bar-items">
                    <ul>
                        <li class="items">
                            <a href="/projects" class="nav-bar-link"><img src="{{asset('img/project.png')}}" alt="Project" class="nav-bar-icon"><span class="nav-bar-text">
                                    Projects
                                </span></a>
                        </li>

                        <li class="items">
                            <a href="/myWork" class="nav-bar-link"><img src="{{asset('img/myWork.png')}}" alt="My Work" class="nav-bar-icon"><span class="nav-bar-text">
                                    My Work
                                </span></a>
                        </li>

                        <li class="items">
                            <a href="/people" class="nav-bar-link"><img src="{{asset('img/ekip.png')}}" alt="People" class="nav-bar-icon"><span class="nav-bar-text">
                                    People
                                </span></a>
                        </li>

                        <li class="items">
                            <a class="nav-bar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <img src="{{asset('img/logout.png')}}" alt="Log Out" class="nav-bar-icon"><span class="nav-bar-text">
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
                    <h2 class="line-1">{{$project->title}}<span><img src="{{asset('img/star.png')}}" alt="Star" class="star-icon"></span></h2>
                    <hr>
                    <div class="card-info-detail">
                        <p class="mb-0">Project ID: #{{$project->id}}</p>
                        <p class="mb-0">Created Date: {{substr($project->created_at,0,10)}}</p>
                        <p class="mb-0" style="color: darkgreen;">Status: {{$project->status}} </p>
                        <p class="mb-0">Due Date : {{substr($project->due_date,0,10)}}</p>
                    </div>
                    <hr>
                    <div style="display:flex;">
                        <p class="d-flex align-items-center" style="font-size:20px ; padding: 0 12px; margin-bottom:0;">Project Description:</p>
                        <p class="project-info mb-0">{{$project->description}}</p>
                    </div>

                    <hr>

                    <div class="tasks-list">
                        <ul class="tasks-list-list">

                            @foreach($tasks as $task)
                            <li class="task-item">
                                <a href="/taskDetailed/{{$task['task_id']}}" class="tasks">{{$task['title']}}</a>
                                <span>
                                    assigned to <b>{{$task['count_of_person']}}</b> Employee
                                </span>

                                <span style="color: @if($task['status'] == 'Done')green @else orange @endif;">{{$task['status']}}</span>


                            </li>
                            @endforeach

                        </ul>
                        <button class="create-project-btn add-task" style="cursor: pointer" onclick="window.location.href = '/addTask/{{$project->id}}' ">Add
                            Task</button>
                    </div>
                    <br>

                    <div class="project-members">
                        <p class="assignee">
                            Assignee
                        </p>

                        @foreach($assigned_person as $person)
                        <div class="project-members-info">
                            <img src="{{asset('img/avatar.svg')}}" alt="Project Member" class="project-members-info-img">
                            <p>{{$person->name}}</p>
                        </div>
                        @endforeach
                    </div>



                </div>


            </div>




        </div>
    </div>


    <script src="{{asset('js/star.js')}}"></script>

</body>

</html>