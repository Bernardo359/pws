<?php $pageTitle = "Create Questions - Answers"; ?>
<?php require 'Views/layout.php' ?>

        <h1>Define Answers</h1>

        <p><strong>Question: <br></strong> <?= htmlspecialchars($text) ?></p>

        <form method="POST" action="<?= url('/admin/questions/store') ?>">
            <input type="hidden" name="text" value="<?= htmlspecialchars($text) ?>">
            <fieldset>
                <legend>Answers (mark the correct one)</legend>
                <?php for ($i = 0; $i < $numAnswers; $i++) { ?>
                    <div class="answer-group">
                        <input type="radio" name="correct_index" value="<?= $i ?>" <?= $i === 0 ? 'checked': '' ?>>
                        <input type="text" name="answers[]" required placeholder="Answer <?php $i + 1 ?>">
                    </div>
                <?php }?>
            </fieldset>

            <button class="btn btn-primary" type="submit">Save</button>
            <a class="btn" href="<?= url('/admin/question/create') ?>" class="homePageButton">Back</a>
        </form>
    </body>
</html>