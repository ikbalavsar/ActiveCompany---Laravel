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
    <h1 class="section-name">People</h1>

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



        <div class="col-sm p-4 project-cards-detailed">
            <div class="card-content-detailed">
                <div class="project-members">
                    <h2 class="assignee">
                        Managers
                    </h2>

                    @foreach(array_chunk($managers, 3) as $chunk)
                        @foreach($chunk as $person)
                            <div class="project-members-info">
                                <img src="img/man.png" alt="Project Member" class="project-members-info-img">
                                <p>{{$person->name}} <br>{{$person->email}}</p>
                            </div>
                        @endforeach

                    @endforeach
                </div>

                <br><br>

                <div class="project-members">
                    <h2 class="assignee">
                        Developers
                    </h2>
                    @foreach(array_chunk($developers, 3) as $chunk)
                        @foreach($chunk as $person)
                            <div class="project-members-info">
                                <img src="img/girl.png" alt="Project Member" class="project-members-info-img">
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
                                <img src="img/girl.png" alt="Project Member" class="project-members-info-img">
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
