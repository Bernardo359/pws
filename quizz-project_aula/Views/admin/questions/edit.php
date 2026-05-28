<?php $pageTitle = "Admin - Edit Questions" ?>
<?php require 'Views/layout.php' ?>


<h1>Edit Questions</h1>
<form method="POST" action="<?= url('/admin/questions/'. $question->id) ?>">
    <label for="text">Question Text:</label><br>
    <input type="text" id="text" name="text" value="<?= $question->text ?>" required><br><br>

    <fieldset>
        <label>Answers (mark the correct answer)</label>
        <?php foreach ($question->answers as $i => $answer): ?>
        <div class="answer-row">
            <input type="radio" name="correct_index" value="<?= $i ?>"
                <?= $answer->is_correct ? 'checked' : ''?>>
            <input type="text" name="answers[<?= $answer-> id ?>]" value="<?= htmlspecialchars($answer->text) ?>" required>
        </div>
        <?php endforeach; ?>
    </fieldset>

    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn" href="<?= url('/') ?>" class="homePageButton">Back</a>
</form>