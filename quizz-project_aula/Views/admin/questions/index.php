<?php $pageTitle = "Admin - Questions" ?>
<?php require 'Views/layout.php' ?>

<h1>Questions</h1>
<?php if (!$questions->isEmpty()): ?>
<a class="btn btn-primary" href="<?= url('/admin/questions/create') ?>">New Question</a>
<br><br>
<?php endif ?>
<?php if ($questions->isEmpty()): ?>
    <p>No questions created</p>
    <a class="btn btn-primary" href="<?= url('/admin/questions/create') ?>">New Question</a>
    <br><br>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $question->id ?></td>
                <td><?= htmlspecialchars($question->text) ?></td>
                <td>
                    <a href="<?= url('/admin/questions/' . $question->id . '/edit') ?>" class="btn">Edit</a>
                    <form method="POST" action="<?= url('/admin/questions/' . $question->id . '/delete') ?>" class="inline">
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Delete this question?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
