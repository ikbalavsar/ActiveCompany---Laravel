<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Rokkitt:wght@200&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Create a New Project</title>
</head>

<body>


<div class="logo-box header">
    <a href="/projects"><img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-header"></a>
    <h1 class="section-name">Projects</h1>
    <a href="/completedProjects" class="completed-projects">Completed Projects</a>
    <div class="search">
        <input type="text" placeholder="Search" class="search-text">
        <img src="{{asset('img/search.png')}}" alt="Search" class="search-icon">
    </div>
    <a href="#"><img src="{{asset('img/help.png')}}" alt="Find Help" class="find-help" title="Find Help"></a>
    <a href="/myProfile"><img src="{{asset('img/profile.png')}}" alt="Profile" class="profile find-help" title="Profile"></a>
    <a href="#"><img src="{{asset('img/notification.png')}}" alt="Notifications" class="notification find-help"
                     title="Notifications"></a>
</div>


<div class="container">

    <div class="row ">
        <div class="col-auto nav-bar">

            <nav class="nav-bar-items">
                <ul>
                    <li class="items">
                        <a href="/projects" class="nav-bar-link"><img src="{{asset('img/project.png')}}" alt="Project"
                                                                      class="nav-bar-icon"><span class="nav-bar-text">
                                    Projects
                                </span></a>
                    </li>

                    <li class="items">
                        <a href="/myWork" class="nav-bar-link"><img src="{{asset('img/myWork.png')}}" alt="My Work"
                                                                    class="nav-bar-icon"><span class="nav-bar-text">
                                    My Work
                                </span></a>
                    </li>

                    <li class="items">
                        <a href="/people" class="nav-bar-link"><img src="{{asset('img/ekip.png')}}" alt="People"
                                                                    class="nav-bar-icon"><span class="nav-bar-text">
                                    People
                                </span></a>
                    </li>

                    <li class="items">
                        <a class="nav-bar-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('img/logout.png')}}" alt="Log Out"
                                 class="nav-bar-icon"><span class="nav-bar-text">
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



        <div class="create-project">

            <form method="POST" class="create-project-info" action="{{ route('addTask') }}">
                @csrf
            <label for="task_title" class="create-project-label">Task Title: </label>
            <input type="text" name="task_title" id="task_title" class="create-project-input">
            <input type="number" name="project_id" style="display: none" value="{{$id}}">
                <label for="task_duedate" class="create-project-label">Due Date: </label>
                <input type="date" name="task_duedate" id="task_duedate" class="create-project-input">

                <label for="task_description" class="create-project-label">Task Description: </label>
                <textarea name="task_description" id="project-description" cols="60" rows="5"
                          class="create-project-input-description"></textarea>
                <div class="project-members">
                    <h2 class="assignee">
                        Choose Assignee
                    </h2>
                    @foreach(array_chunk($persons, 3) as $chunk)
                        @foreach($chunk as $person)
                            <div class="project-members-info choose-team">
                                <input name= "persons[]" type="checkbox" value="{{$person->id}}">
                                <img src="{{asset('img/girl.png')}}" alt="Project Member" class="project-members-info-img">
                                <p>{{$person->name}} <br> {{$person->role}}</p>
                            </div>
                        @endforeach

                    @endforeach

                </div>
                <button type="submit" class="create-project-btn text-center">
                    {{ __('Add Task') }}
                </button>
            </form>


            <br><br>


        </div>


    </div>
</div>



</body>

</html>
