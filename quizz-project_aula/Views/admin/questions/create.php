<?php $pageTitle = "Admin - Create Questions" ?>
<?php require 'Views/layout.php' ?>

<h1>Create Questions</h1>
<form method="POST" action="<?= url('/admin/questions/create') ?>">
    <label for="text">Question Text:</label><br>
    <input type="text" id="text" name="text" required><br><br>

    <label for="num_answers">Number of Possible Answers (2-15):</label>
    <input type="number" min="2" max="15" id="num_answers" name="num_answers" required><br><br>

    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn" href="<?= url('/') ?>" class="homePageButton">Back</a>
</form>