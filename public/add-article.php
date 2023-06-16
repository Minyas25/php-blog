<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Catégorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add-article.php">Poster</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="apropos.php">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-center">Ajouter un article</h1>

    <?php
    use App\Repository\ArticleRepository;
    use App\Repository\CategoryRepository;
    require '../vendor/autoload.php';
    $repository = new ArticleRepository();

    $categoryRepository = new CategoryRepository();

    $categories = $categoryRepository->findAll();

    if (count($categories) > 0) {
        ?>
        <div class="container mt-5">
            <form action="add" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Titre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Catégorie :</label>
                    <select id="category" name="category" class="form-select" required>
                       
                <?php
                foreach ($categories as $category) {
                    echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
                }
                ?>
            </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
        <?php
    } else {
        echo '<p class="text-center mt-5">Aucune catégorie disponible. Veuillez en ajouter avant de créer un article.</p>';    }
        
    ?>

</body>
</html>
