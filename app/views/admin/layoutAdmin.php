<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title><?= htmlspecialchars($title ?? 'Админ') ?></title>
</head>

<body>
  <div class="row" style="min-height: 100vh;">

    <?php include_once(__DIR__ . '/../includes/adminSidebar.php'); ?>

    <div class="col">

      <br>
      <div class="container">
        <div class="row">
          <h1 class="col-10"><?= htmlspecialchars($title ?? 'Админ') ?></h1>

          <?php
          if (isset($options)) {
            echo '<form method="post" id="sortBy" class="col" action="index.php?adminAction=' . htmlspecialchars($_GET["adminAction"]) . '">
                    <select class="form-select" style="height: 40px;" name="column" onchange="submitForm()">
                      ' . $options . '
                    </select>
                  </form>
                  <div class="col-1"></div>';
          }
          ?>
        </div>

        <div>&nbsp;</div>

        <?php if (!empty($message)) echo $message; ?>
        <?php if (!empty($error)) echo $error; ?>

        <?= $content ?>
      </div>
    </div>

  </div>
  <br>
  <hr>

  <footer>
    <div class="container">
      <p>Все права защищены | Админ-панель + Bootstrap ❤️</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    function submitForm() {
      document.getElementById('sortBy').submit();
    }
  </script>

</body>

</html>
