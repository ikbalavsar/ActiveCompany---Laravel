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

    <link rel="stylesheet" href="css/main.css">
    <title>Welcome to Active Company</title>
</head>

<body>


<div class="logo-box header">
    <a href="/"><img src="img/logo.png" alt="Logo" class="logo-header"></a>
    <h1 class="section-name completed-projects">Completed Projects</h1>
    <a href="/" class="completed-projects">Active Projects</a>
    <div class="search">
        <input type="text" placeholder="Search" class="search-text">
        <img src="img/search.png" alt="Search" class="search-icon">
    </div>
    <a href="#"><img src="img/help.png" alt="Find Help" class="find-help" title="Find Help"></a>
    <a href="/myProfile"><img src="img/profile.png" alt="Profile" class="profile find-help" title="Profile"></a>
    <a href="#"><img src="img/notification.png" alt="Notifications" class="notification find-help"
                     title="Notifications"></a>
</div>


<div class="container">

    <div class="row ">
        <div class="col-auto nav-bar">

            <nav class="nav-bar-items">
                <ul>
                    <li class="items">
                        <a href="/" class="nav-bar-link"><img src="img/project.png" alt="Project"
                                                                          class="nav-bar-icon"><span class="nav-bar-text">
                                    Projects
                                </span></a>
                    </li>

                    <li class="items">
                        <a href="/myWork" class="nav-bar-link"><img src="img/myWork.png" alt="My Work"
                                                                        class="nav-bar-icon"><span class="nav-bar-text">
                                    My Work
                                </span></a>
                    </li>

                    <li class="items">
                        <a href="/people" class="nav-bar-link"><img src="img/ekip.png" alt="People"
                                                                        class="nav-bar-icon"><span class="nav-bar-text">
                                    People
                                </span></a>
                    </li>

                    <li class="items">
                        <a class="nav-bar-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="img/logout.png" alt="Log Out"
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





        @foreach(array_chunk($projects, 3) as $chunk)
            @foreach($chunk as $project)
                <div class="col-sm p-4 project-cards">
                    <div class="card-content">
                        <h2 class="line-1">{{$project->title}}<span><img src="img/star.png" alt="Star" class="star-icon"></span></h2>
                        <h4 class="card-info-line1">
                            Total time:  <span class="alert-danger">{{$project->total_time_sheet}} </span>
                        </h4>

                        <p>
                            {{$project->description}}
                        </p>

                        <div class="btn-1">
                            <span style="color: grey;">Completed</span>

                        </div>


                    </div>

                </div>
            @endforeach
            <div class="w-100"></div>

            <div class="col-sm-1" style="margin-left: 17px;"></div>
        @endforeach

    </div>
</div>



</body>

</html>
