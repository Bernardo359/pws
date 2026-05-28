<?php $pageTitle = 'Quiz - Home'; ?>
<?php require 'Views/layout.php'; ?>


<form method="POST" action="">
    <label for="player_name">Your name: </label>
    <input type="text" id="player_name" name="player_name" required>
    <button type="submit" class="btn btn-primary">Start Quizz</button>
</form>

</body>
</html>