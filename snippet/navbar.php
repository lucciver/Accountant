<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Orak</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == "index.php") echo "active"; ?>">
        <a class="nav-link" href="index.php">Overview</a>
      </li>
      <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == "add.php") echo "active"; ?>">
        <a class="nav-link" href="add.php">Add</a>
      </li>
    </ul>
  </div>
</nav>
