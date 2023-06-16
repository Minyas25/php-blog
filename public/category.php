<!DOCTYPE html>
<html>
<head>
    <title>Liste des catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    <h1 class="text-center">Liste Catégorie</h1>

    <div class="container mt-5">
        <?php
        use App\Repository\ArticleRepository;
        use App\Repository\CategoryRepository;
        require '../vendor/autoload.php';

        $categoryRepository = new CategoryRepository();

        $categories = $categoryRepository->findAll();

        foreach ($categories as $category) {
            echo '<h2>' . $category->getName() . '</h2>';
            $articleRepository= new ArticleRepository();

            $articles = $articleRepository->findByCategoryId($category->getId());

            if (is_array($articles) && count($articles) > 0) {
                echo '<ul>';
                foreach ($articles as $article) {
                    echo '<li>' . $article->getName() . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucun article trouvé pour cette catégorie.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
