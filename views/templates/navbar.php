<?php
session_start();
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="/index.php">Home</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>


    <!-- Top Navigation: Left Menu -->
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="/index.php"><i class="fa fa-home fa-fw"></i> USTH</a></li>
    </ul>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-linux fa-fw"></i> FAQ
            </a>
        </li>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>' . $_SESSION['name'] . '<b class="caret"></b>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
					</li>
					<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
					</li>
					<li>
						<form action="/views/include/logout.inc.php" method="post">
							<button>Logout</button>
						</form>
					</li>
				</ul>
			</li>';
        } else {
            echo '<li>
				<ul class="nav navbar-inverse">
						<li>
							<a href="/views/templates/login.php">Login</a>
									
						</li>	
					</ul>
			</li>';
        }
        ?>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <form action="/views/admin/search.php" method="POST">
                            <input type="text" name="search" placeholder="Search...">
                            <span class="input-group-btn">
									<button class="btn btn-primary" name="submit-search" type="submit">
										<i class="fa fa-search" name="submit-search"></i>
									</button>
								</span>
                        </form>
                    </div>
                </li>
                <li>
                    <a><i class="fa fa-th-large fa-fw"></i> Bachelor <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/views/admin/view.php">View/Edit</a>

                        </li>
                        <li>
                            <a href="/views/admin/import.php">Import</a>

                        </li>
                        <li>
                            <a href="/views/admin/export.php">Export</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>