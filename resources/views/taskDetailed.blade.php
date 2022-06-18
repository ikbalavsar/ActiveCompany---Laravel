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
    <title>Welcome to Active Company</title>
</head>

<body>


<div class="logo-box header">
    <a href="/project"><img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-header"></a>
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



        <div class="col-sm p-4 project-cards-detailed">
            <div class="card-content-detailed">
                <h2 class="line-1">{{$task[0]->title}} </h2>
                <div class="card-info-detail">

                    <p>Project ID: {{$project[0]->id}}</p>
                    <p>Task ID: {{$task[0]->id}}</p>

                    <p>Created Date: {{$task[0]->created_at}}</p>
                    <p>Status: <span style="color: @if($task[0]->status == 'Active')green @else red @endif;"> {{$task[0]->status}}</span> </p>
                    <p>Due Date : {{$task[0]->due_date}}</p>

                </div>

                <p class="project-info">
                   {{$task[0]->description}}

                </p>



                @foreach($assigned_user as $user)
                    <div class="tasks-updates-info">
                        <img src="{{asset('img/man.png')}}" alt="Team Member" class="tasks-updates-info-img">
                        <h3>{{$user->name}}</h3>
                        <p class="tasks-updates-info-p">//TO-DO ikbal</p>
                    </div>
                @endforeach


                <form action="">
                    <label for="description">Send Your Description</label><br>
                    <input type="text" id="description" name="description"><br>
                    <input type="submit" value="Submit">
                </form> 

            </div>


        </div>




    </div>
</div>

<script src="{{asset('js/star.js')}}"></script>

</body>

</html>
