<!-- Fixed navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<a class="navbar-brand" href="#">SIS</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./students.php">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./courses.php">Courses</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" href="./grades.php">grades</a>
        </li> 
    </ul>
    <form action="./group.php" class="form-inline mt-2 mt-md-0">
    <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>