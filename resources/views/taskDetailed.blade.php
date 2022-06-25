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
        <a href="/project"><img src="{{asset('img/logo.png')}}" alt="Logo" class="logo-header"></a>
        <h1 class="section-name">Projects</h1>
        <a href="/completedProjects" class="completed-projects">Completed Projects</a>
        <div class="search">
            <input type="text" placeholder="Search" class="search-text">
            <img src="{{asset('img/search.png')}}" alt="Search" class="search-icon">
        </div>
        <a href="#"><img src="{{asset('img/help.png')}}" alt="Find Help" class="find-help" title="Find Help"></a>
        <a href="/myProfile"><img src="{{asset('img/profile.png')}}" alt="Profile" class="profile find-help" title="Profile"></a>
        <a href="#"><img src="{{asset('img/notification.png')}}" alt="Notifications" class="notification find-help" title="Notifications"></a>
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
                    <h2 class="line-1">{{$task[0]->title}} </h2>
                    <hr>
                    <div class="card-info-detail">

                        <p class="mb-0">Project ID: {{$project[0]->id}}</p>
                        <p class="mb-0">Task ID: {{$task[0]->id}}</p>
                        <p class="mb-0">Created Date: {{substr($task[0]->created_at,0,10)}}</p>
                        <p class="mb-0">Status: <span style="color: @if($task[0]->status == 'Active')green @else red @endif;"> {{$task[0]->status}}</span> </p>
                        <p class="mb-0">Due Date : {{substr($task[0]->due_date,0,10)}}</p>

                    </div>
                    <hr>
                    <div style="display:flex;">
                        <p class="d-flex align-items-center mb-0" style="font-size:20px ; padding: 0 12px; margin-bottom:0;">Task Description:</p>
                        <p class="project-info mb-0">
                            {{$task[0]->description}}
                        </p>
                    </div>
                    <hr>



                    @foreach($all_feedback as $user)
                    <div class="tasks-updates-info">
                        <img src="{{asset('img/avatar.svg')}}" alt="Team Member" class="tasks-updates-info-img">
                        <h3>{{$user['assigned_user']}}</h3>
                        <p class="tasks-updates-info-p">{{$user['feedback']}}</p>
                    </div>
                    @endforeach

                    <hr>


                    <form method="POST" style="display: @if($boolean_flag == 0) none @endif" action="{{ route('send_feedback') }}">
                        @csrf

                        <label style="font-size: 20px;" for="description">Update Your Description</label><br>
                        <div class="form-text-container">
                            <textarea name="feedback" id="about_me" class="form-input form-text" placeholder="What are you doing for this project?" rows="5"></textarea>
                        </div>
                        <input style="display: none" name="task_id" id="task_id" value="{{$task[0]->id}}">
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="">
                                <button type="submit" class="btn-signin">
                                    {{ __('Update Feedback') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>




        </div>
    </div>

    <script src="{{asset('js/star.js')}}"></script>

</body>

</html>