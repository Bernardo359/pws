<?php $pageTitle = "Create Questions - Answers"; ?>
<?php require "Views/layout.php"; ?>

<h1>Define Answers</h1>

<p><strong>Question: </strong> <?= htmlspecialchars($text) ?></p>

        <form method="POST" action="<?= url('/admin/questions/store'); ?>">
            <input type="hidden" name="text" value="<?= htmlspecialchars($text)?>"
            <fieldset>
                <legend>Answers (mark the correct one)</legend>
                <?php for($i = 0; $i < $numAnswers; $i++): ?>
                    <div class="answer-row">
                        <input type="radio" name="correct_index" value="<?= $i ?>" <?= $i === 0 ? 'checked' : ''?>>
                        <input type="text" name="answers[]" placeholder="Answer <?= $i +1 ?>" required>
                    </div>
                <?php endfor; ?>
            </fieldset>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= url('/admin/questions/create') ?>" class="btn">Back</a>
        </form>
    </body>
</html>