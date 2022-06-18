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
    <title>My Profile</title>
</head>

<body>


<div class="logo-box header">
    <a href="/"><img src="img/logo.png" alt="Logo" class="logo-header"></a>
    <h1 class="section-name">My Profile</h1>
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

        <div class="my-profile">
            <img src="img/profile.png" alt="Profile Picture" class="profile-picture">
            <span style="font-size: 15px; padding-top: 5px; padding-left: 10px;">ID : 64180012 <br>Job Description:
                    Developer</span>


            <label for="my-profile-name" class="my-profile-label">First Name & Last Name</label>
            <input type="text" placeholder="Hakan Okut" class="my-profile-input" name="my-profile-name" required>
            <label for="my-profile-mail" class="my-profile-label">Email</label>
            <input type="email" placeholder="hakanokut232323@gmail.com " class="my-profile-input"
                   name="my-profile-mail" required>
            <p>*This e-mail is your login username,so it is required.</p>

            <label for="my-profile-password" class="my-profile-label">Change Password</label>
            <input type="password" class="my-profile-input" name="my-profile-password">


            <button class="my-profile-btn" onclick="window.location.href = '/' ">Save Changes</button>

        </div>

    </div>
</div>

</body>

</html>
