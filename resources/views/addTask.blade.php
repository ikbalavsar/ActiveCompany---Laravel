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
    <title>Create a New Project</title>
</head>

<body>


<div class="logo-box header">
    <a href="/"><img src="img/logo.png" alt="Logo" class="logo-header"></a>
    <h1 class="section-name completed-projects">Create New Project</h1>

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



        <div class="create-project">

            <div class="create-project-info">

                <label for="project-title" class="create-project-label">Task Title: </label>
                <input type="text" name="project-title" id="project-title" class="create-project-input">

                <label for="project-duedate" class="create-project-label">Due Date: </label>
                <input type="date" name="project-duedate" id="project-duedate" class="create-project-input">

                <label for="project-description" class="create-project-label">Task Description: </label>
                <textarea name="project-description" id="project-description" cols="60" rows="5"
                          class="create-project-input-description"></textarea>
            </div>


            <br><br>

            <div class="project-members">
                <h2 class="assignee">
                    Choose Assignee
                </h2>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/girl.png" alt="Project Member" class="project-members-info-img">
                    <p>Ikbal Avsar <br> Front End Developer</p>
                </div>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/man.png" alt="Project Member" class="project-members-info-img">
                    <p>Emre Ayar <br> Full Stack Developer</p>
                </div>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/man-1.png" alt="Project Member" class="project-members-info-img">
                    <p>Kemal Koçyiğit <br> Analyst</p>
                </div>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/man-1.png" alt="Project Member" class="project-members-info-img">
                    <p>Nihat Güngör <br> Android Developer</p>
                </div>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/girl.png" alt="Project Member" class="project-members-info-img">
                    <p>Zeynep Yılmaz <br> Full Stack Developer </p>
                </div>

                <div class="project-members-info choose-team">
                    <input type="checkbox">
                    <img src="img/girl.png" alt="Project Member" class="project-members-info-img">
                    <p>Betül Okut <br> Analyst</p>
                </div>


            </div>

            <button class="create-project-btn" onclick="window.location.href = '/seeDetails' ">Add Task</button>

        </div>


    </div>
</div>



</body>

</html>
