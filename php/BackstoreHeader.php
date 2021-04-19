<!--Top header for logo and user tools-->
<nav class="navbar navbar-inverse">
    <!--Allow content to span entire page-->
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Hole Foods <span><img src="images/logo.png" alt="logo.png" style="height: 1.5em;"></span></a>

            <!--Show user icon as button for dropdown when viewport drops below 775px width-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#commonHeader">
                    <span class="glyphicon glyphicon-user" style="color:white;"></span>
            </button>                
        </div>

                       
    </div>        
</nav>

<!--Menu for page navigation-->
<nav class="navbar navbar-default">
    <!--Limit content to center of page-->
    <div class="container">
        <!--Show button with 3 bars for menu dropdown when viewport drops below 775px width-->
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainMenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>

        <!--when viewport drops below 775px width collapse-->
        <div class="collapse navbar-collapse" id="mainMenu">
            <!--List of links to pages user can use-->
            <ul class="nav navbar-nav">
                <li><a href="Backstore(P7).php">Product List</a></li>
                <li><a href="Backstore(P8Add).php">Add/Edit Products</a></li>                   
                <li><a href="Backstore(P9).php">User List</a></li>
                <li><a href="Backstore(P10).php">Add/Edit Users</a></li>
                <li><a href="Backstore(P11).php">Order List</a></li>
                <li><a href="Backstore(P12).php">Add/Edit Orders</a></li>
            </ul>

            <!--Show link to shopping cart floated on the right of the navbar-->
           
        </div>                   
    </div>        
</nav>